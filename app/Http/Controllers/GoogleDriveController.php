<?php

namespace App\Http\Controllers;

use Exception;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class GoogleDriveController extends Controller
{

    private $drive;
    public function __construct(Google_Client $client)
    {
        $this->middleware(function ($request, $next) use ($client) {
            $client->refreshToken(Auth::user()->refresh_token);
            $this->drive = new Google_Service_Drive($client);
            return $next($request);
        });
    }

    public function getFolders()
    {
        $this->listFolders('root');
    }

    public function listFolders($id)
    {
        $query = "mimeType='application/vnd.google-apps.folder' and '" . $id . "' in parents and trashed=false";

        $optParams = [
            'fields' => 'files(id,name)',
            'q' => $query
        ];

        $results = $this->drive->files->ListFiles($optParams);
        $list = $results->getFiles();

        if (count($list) == 0) {
            print Redirect::to('drive/empty');
        } else {
            print view('drive.index', compact('list'));
        }
    }

    public function isEmpty()
    {
        return view('drive.empty');
    }


    public function uploadFiles(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('drive.upload');
        } else {
            $this->createFile($request->file('file'));
        }
    }

    public function upload(Request $request)
    {
        if ($request->file('file')) {

            $files = $request->file('file');
            if (!is_array($files)) {
                $files = [$files];
            }

            $fileList = array();

           /*  $fileMetadata = new Google_Service_Drive_DriveFile(array(
                'name' => 'GerFiles',
                'parents' => array(env('GOOGLE_DRIVE_FOLDER_ID')),
                'mimeType' => 'application/vnd.google-apps.folder'
            ));

            $folderId = $this->drive->files->create($fileMetadata, array(
                'fields' => 'id'
            )); */

            for ($i = 0; $i < count($files); $i++) {

                $fileArray = array();

                $file = $files[$i];
                $filename = $file->getClientOriginalName();

                $fileMetadata = new Google_Service_Drive_DriveFile(array(
                    'name' => $filename,
                    // /'parents' => array($folderId)
                ));

                $contentFile = file_get_contents($file);

                $fileId = $this->drive->files->create($fileMetadata, array(
                    'data' => $contentFile,
                    //'mimeType' => 'image/jpeg',
                    'uploadType' => 'multipart',
                    'fields' => 'id'
                ));

                $fileArray[] = $fileId;

                    array_push($fileList, $fileArray);
            }

            return $fileList;
        } else {
            return ' oh no';
        }
    }

    public function delete (Request $request){

        Storage::disk('google')->delete($item->items['fileId']);
    }
}

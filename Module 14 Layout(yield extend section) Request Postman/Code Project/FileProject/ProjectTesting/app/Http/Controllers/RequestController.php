<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RequestController extends Controller
{
    public function store_file(Request $request){
        // Validate the request to ensure a file is provided
        $request->validate([
            'photo-file' => 'required|file|max:2048', // Adjust the max size as per your requirements
        ]);

        // Get the uploaded file
        $recive_file = $request->file('photo-file');

        // Define the destination path in the public folder
        //$destinationPath = 'uploads/profilePic';
        $destinationPath = public_path('uploads/profilePic');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Generate a unique file name to avoid overwriting
        //$fileName = time() . '_' . $recive_file->getClientOriginalName();
        $fileName=time().'.'.$recive_file->getClientOriginalExtension();

        // Move the file to the public/uploads directory
        $recive_file->move(public_path($destinationPath), $fileName);

        // Return a success response with the file path
        return response()->json([
            'success' => true,
            'message' => 'File uploaded successfully!',
            'file_path' => asset($destinationPath . '/' . $fileName),
        ]);

    }
    public function store_day_wise_file(Request $request){
        // Validate the request to ensure a file is provided
        $request->validate([
            'photo-file' => 'required|file|max:2048', // Adjust the max size as per your requirements
        ]);

        // Get the uploaded file
        $recive_file = $request->file('photo-file');

        // Create a dynamic folder name based on the current date (e.g., '12_4_2024')
        $dateFolder = date('d_m_Y');
        $destinationPath = public_path('uploads/profilePic/' . $dateFolder);

        // Ensure the directory exists or create it
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Generate a unique file name to avoid overwriting
        $fileName = time() . '_' . $recive_file->getClientOriginalName();

        // Move the file to the dynamically created directory
        $recive_file->move($destinationPath, $fileName);

        // Generate the file's public URL
        $fileUrl = asset('uploads/profilePic/' . $dateFolder . '/' . $fileName);

        // Return a success response with the file path
        return response()->json([
            'success' => true,
            'message' => 'File uploaded successfully!',
            'file_path' => $fileUrl,
        ]);
    }
}

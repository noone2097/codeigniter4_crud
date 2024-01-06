<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class StudentController extends BaseController
{
    public function index()
    {
        $fetchStudentModel = new StudentModel();
        $data['student'] = $fetchStudentModel->findAll();
        return view('student/list', $data);
    }

    public function create()
    {
        return view('student/add');
    }
    public function store()
    {
        $insertStudent = new StudentModel();

        if ($img = $this->request->getFile('profile')) {
            if ($img->isValid() && !$img->hasMoved()) {
                $imageName = $img->getRandomName();
                $img->move('uploads/', $imageName);
            }
        }

        $data = array(
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('age'),
            'profile' => $imageName,
        );
        $insertStudent->insert($data);
        return redirect()->to('/student')->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        $fetchStudentModel = new StudentModel();
        $data['student'] = $fetchStudentModel->where('id', $id)->first();
        return view('student/edit', $data);
    }
    public function update($id)
    {
        $updateStudent = new StudentModel();
        $db = \db_connect();
        #or pwede sad
        #$db = \Config\Database::connect();

        if ($img = $this->request->getFile('profile')) {
            if ($img->isValid() && !$img->hasMoved()) {
                $imageName = $img->getRandomName();
                $img->move('uploads/', $imageName);
            }
        }
        if (!empty($_FILES['profile']['name'])) {
            $db->query("UPDATE students SET profile = '$imageName' WHERE id = '$id' ");
        }

        $data = array(
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('age'),
        );
        $updateStudent->update($id, $data);
        return redirect()->to('/student')->with('success', 'Student updated successfully!');

    }

    public function delete($id)
    {
        $deleteStudent = new StudentModel();
        $deleteStudent->delete($id);
        return redirect()->to('/student')->with('success', 'Student deleted successfully!');
    }
}

<?php 

use Core\Database;
use Core\App;
use Core\Validator;


$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
        
    }

    if (! empty($errors)) {
        return view(
            'notes/edit.view.php',
             [
                'heading' => 'Create Note',
                'errors' => $errors
             ]);
    
    }

    $db->query('UPDATE notes SET body = :body where id = :id', [
        'body' => $_POST['body'],
        'id' => $note['id']
    ]);

   header('Location: /notes');
   die();

}

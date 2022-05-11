<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url(thumb2-library-concepts-stack-of-books-education-background-books-background-with-books.jpg);
            background-color: #000;
            color: #fff;
            margin-top: 5%;
            margin-right: 15%;
            margin-left: 5%;
            margin-bottom: 5%;
            font-size: 24px;
        }
    </style>
</head>
<body>





<?php

$host = "localhost:8889";
$user = "root";
$password ="root";
$database = "book";

$book_id = "";
$book_name = "";
$author_name = "";
$book_type = "";
$fiction_type = "";
$genre = "";
$description="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['book_id'];
    $posts[1] = $_POST['book_name'];
    $posts[2] = $_POST['author_name'];
    $posts[3] = $_POST['book_type'];
    $posts[4] = $_POST['fiction_type'];
    $posts[5] = $_POST['genre'];
    $posts[6] = $_POST['description'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM books WHERE book_name = '{$data[1]}' ";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $book_id = $row['book_id'];
                $book_name = $row['book_name'];
                $author_name = $row['author_name'];
                $book_type = $row['book_type'];
                $fiction_type = $row['fiction_type'];
                $genre = $row['genre'];
                $description = $row['description'];
                echo 'THE DETAILS OF  '.$book_name.' ARE:';
                echo "<br><br><br>";
                echo "Book id:";
                echo "<br><br>";
                echo $book_id;
                
                echo "<br><br><br>";
                echo "Book name:";
                echo "<br><br>";

                echo $book_name;
                echo "<br><br><br>";
                echo "Author name:";
                echo "<br><br>";
                echo $author_name;
                echo "<br><br><br>";
                echo "Book type:";
                echo "<br><br>";
                echo $book_type;
                echo "<br><br><br>";
                echo "Fiction Type:";
                echo "<br><br>";
                echo $fiction_type;
                echo "<br><br><br>";
                echo "Genre:";
                echo "<br><br>";
                echo $genre;
                echo "<br><br><br>";
                echo "Description:";
                echo "<br><br>";
                echo $description;
                echo "<br><br><br>";


            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO books (book_id,book_name,author_name,book_type,fiction_type,genre,description)VALUES ('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}','{$data[6]}')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo '<script type="text/javascript">alert("Book inserted successfully:)")</script>';
                            
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM books WHERE book_name = '$data[1]'";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo '<script type="text/javascript">alert("Book Deleted successfully:)")</script>';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE books SET  author_name='$data[2]',book_type='$data[3]',fiction_type='$data[4]',genre='$data[5]',description='$data[6]' WHERE book_name = '$data[1]'";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo '<script type="text/javascript">alert("Book updated successfully:)")</script>';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}



?>


    
</body>
</html>
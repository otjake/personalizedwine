<?php

function inputtype($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function page_redirect($location = NULL)
{
    if ($location != NULL) {
        header("Location:{$location}");
        exit;
    }
}

function stock_upload_form()
{

    global $connection;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['upload'])) {
            if (!empty($_POST['category'])  && !empty($_POST["subcategory"]) && !empty($_POST["quantity"])  && !empty($_POST["p_code"]) &&  !empty($_POST["date"])) {
                $category = ($_POST['category']);
                $sub_category = inputtype($_POST["subcategory"]);
                $quantity = inputtype($_POST["quantity"]);
                $p_code = inputtype($_POST["p_code"]);
                $date = ($_POST["date"]);

                //to get specific id so we know where we are updating


                $usql = "INSERT INTO stock (category,sub_category,quantity,product_code,date_created) VALUES ('{$category}','{$sub_category}','{$quantity}','{$p_code}','{$date}')";
                var_dump($usql);
                $result = $connection->query($usql);
                if ($result) {

                    global $Smessage;
                    $Smessage = "Upload Successful";
                } else {

                    global $Emessage;
                    $Emessage = "Upload Failed";
                }
            } else {

                global $Emmessage;
                $Emmessage = "you left tabs empty";
            }
        }
    }
}

function product_upload_form()
{

    global $connection;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['uploadp'])) {
            if (!empty($_POST["product_name"])  && !empty($_POST["product_desc"]) && !empty($_POST["product_price"])   &&  !empty($_POST["product_code"]) && !empty($_POST["date"]) &&  !empty($_POST["keyword"])) {
                $product_name = ($_POST["product_name"]);
                $product_desc = inputtype($_POST["product_desc"]);
                $price = inputtype($_POST["product_price"]);
                $product_code = inputtype($_POST["product_code"]);
                $product_image = $_FILES['product_image']['name']; //geting name of the image;
                $product_image_tmp = $_FILES['product_image']['tmp_name']; //getting image temporary name on the server
                move_uploaded_file($product_image_tmp, "product_image/$product_image"); //the function move_uploaded_file moves image from tmp storage to folder


                $date = ($_POST["date"]);
                $keyword = inputtype($_POST['keyword']);



                $pusql = "INSERT INTO product (product_name,product_desc,product_price,product_image,product_code,date_created,keyword) VALUES ('{$product_name}','{$product_desc}','{$price}','{$product_image}','{$product_code}','{$date}','{$keyword}')";
                var_dump($pusql);
                $result = $connection->query($pusql);
                if ($result) {
                    global $Smessage;
                    $Smessage = "Upload Successful";
                } else {
                    echo "<script>alert('Product has not been Inserted')</script>";
                    global $Emessage;
                    $Emessage = "Upload Failed";
                }
            } else {

                global $Emmessage;
                $Emmessage = "you left tabs empty";
            }
        }
    }
}




function review_view()
{
    global $connection;
    $sql = "SELECT * FROM reviews";   //$psql="SELECT * FROM posts LIMIT 0,2";

    $results_per_page = 2;

    $result = mysqli_query($connection, $sql);

    $number_of_results = mysqli_num_rows($result);
    //    if($result_psql->num_rows >0){

    //determine number of total pages available
    $number_of_pages = ceil($number_of_results / $results_per_page);

    //determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    //DETERMINE THE SQL LIMIT starting number for the results on the display page
    $this_page_first_result = ($page - 1) * $results_per_page;

    //sql query to get the items of each page
    global $connection;
    $sql = "SELECT * FROM reviews ORDER BY id DESC LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($connection, $sql);


    while ($rows = mysqli_fetch_array($result)) {

        echo "<div class='jumbotron' style='background-color:'whitesmoke'>";
        echo "<p class='blog-post-meta'>" . $rows['date_created'] . "</p>";
        echo "<a href='#'>" . $rows['name'] . "</a><br>";
        $body = $rows['comments'];
        echo $body;
        $post_id = $rows['id'];

        echo "<br>";
        echo "<a href='display_review.php?posts=" . $post_id . "' class='btn btn-primary'>Allow</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='#' onclick='delete_review({$post_id})' class='btn btn-danger'>DELETE</a>";
        echo "<br>";
        echo "<br>";
        echo "<hr>";
        echo "</div>";
    }

    //displaying page links numbers
    for ($page = 1; $page <= $number_of_pages; $page++) {
        echo "<ul class='pagination '>
 <li><a href='index.php?page=" . $page . "'>" . $page . "</a></li></ul>";
    }
}


?>
<?php
function search_result()
{
    if (isset($_GET['search'])) { //if we are not looking  to get categories run the code below

        $user_search = $_GET['search_query'];

        global $connection;

        $get_post = "SELECT * FROM posts WHERE keyword like '%$user_search%'"; //displaying search posts like keywords

        $run_post = mysqli_query($connection, $get_post);
        if ($run_post->num_rows > 0) {

            while ($rows = mysqli_fetch_array($run_post)) {


                echo "<div class='jumbotron' style='background-color:'whitesmoke'>";
                echo "<p class='blog-post-meta'>" . $rows['date'] . "</p>";
                echo "<a href='#'>" . $rows['author'] . "</a><br>";
                echo "<p class='blog-post-meta'>" . $rows['title'] . "</p>";
                $body = $rows['body'];
                $body_len = substr($body, 0, 100); //length of words to display
                echo $body_len . "...";
                $post_id = $rows['post_id'];

                echo "<br>";
                echo "<a href='edit.php?posts=" . $post_id . "' class='btn btn-primary'>UPDATE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<a href='delete.php?posts=" . $post_id . "'  onclick='return confirm('Are you sure ?)' class='btn btn-danger'>DELETE</a>";
                echo "<br>";
                echo "<br>";
                echo "<hr>";
                echo "</div>";
            }
        } else {
            echo "<div class='jumbotron' style='background-color:'white'>";
            echo "<h2 class='error' >Ooops your search dosen't match any description try another format</h2>";
            echo "</div>";
        }
    }
}



?>

<?php
function get_all_comments_by_post_id()
{
    //so as to use to display comments amount for each post
    if (isset($_GET['posts'])) {

        $id = $_GET['posts'];
        global $connection;
        $comment_query = "SELECT * FROM comments WHERE post_id={$id}";
        $comment_result = mysqli_query($connection, $comment_query);
        return $comment_result;
    }
}

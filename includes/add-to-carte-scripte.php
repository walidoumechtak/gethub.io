<?php 
    session_start();
    ob_start();
   if(isset($_SESSION['carte'])){

    //    $array_book_id = array_column($_SESSION['carte'], 'bookId');
    //    print_r($array_book_id);
       if(in_array($_GET['idBookAdd'], $_SESSION['carte'])){
                header('Location: ../books.php?bookIsAlreadyIn');

                // if(isset($_GET['books'])){
                //     header('Location: ../books.php?bookIsAlreadyIn');
                //     exit();
                // }
                // if(isset($_GET['searchPage'])){
                //     header('Location: ../search-page.php?bookIsAlreadyIn');
                //  exit();
                // }
                // if(isset($_GET['productPage'])){
                //     header('Location: ../product-page.php?bookIsAlreadyIn');
                //  exit();
                // }


       }else{
        //    $count = count($array_book_id);
           $count = count($_SESSION['carte']);
            // $array_items = array(
            //     'bookId' => $_GET['idBookAdd']
            // );
            $idBook = $_GET['idBookAdd'];
           $_SESSION['carte'][$count] = $idBook;
           
           header('Location: ../books.php?bookAdded');

        //    if(isset($_GET['books'])){
        //        header('Location: ../books.php?bookAdded');
        //        exit();
        //    }
        //    if(isset($_GET['searchPage'])){
        //     header('Location: ../search-page.php?bookAdded');
        //     exit();
        //    }
        //     if(isset($_GET['productPage'])){
        //     header('Location: ../product-page.php?bookAdded');
        //     exit();
        //    }


       }

   }else
        {

            $idBook = $_GET['idBookAdd'];
            
            // $array_items = array(
            //     'bookId' => $idBook
            // );

        $_SESSION['carte'][0] = $idBook;
        print_r($_SESSION['carte']);
        header('Location: ../books.php?bookAdded');


        // if(isset($_GET['books'])){
        //     header('Location: ../books.php?bookAdded');
        //     exit();
        // }
        //  if(isset($_GET['searchPage'])){
        //  header('Location: ../search-page.php?bookAdded');
        //  exit();
        // }
        //  if(isset($_GET['productPage'])){
        //  header('Location: ../product-page.php?bookAdded');
        //  exit();
        // }

        }





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic treeview Structure</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
</head>
<body>
    
<div class="container" style="width:900px;">
   <h2 align="center">Dynamic Tree View Structure</h2>
   <br /><br />
   <div class="row">
    <div class="col-md-6">
     <h3 align="center"><u>Add New Category</u></h3>
     <br />
     <form method="post" id="treeview_form">
      <div class="form-group">
       <label>Select Parent Category</label>
       <select name="parent_category" id="parent_category" class="form-control">
       
       </select>
      </div>
      <div class="form-group">
       <label>Enter Category Name</label>
       <input type="text" name="category_name" id="category_name" class="form-control">
      </div>
      <div class="form-group">
       <input type="submit" name="action" id="action" value="Add" class="btn btn-info" onclick="AddCategory();"/>
      </div>
     </form>
    </div>
    <div class="col-md-6">
     <h3 align="center"><u>Category Tree</u></h3>
     <br />
     <div id="displayList"></div>
    </div>
   </div>
  </div>
 </body>
</html>
<script>

//display list on page load
$(document).ready(function()
{
    FillParentDeatils();
    displayTreeviewList();
});

function FillParentDeatils()
  {
   $.ajax({
    dataType:"json",
    type:'post',
    url:'fill_parent.php',
    success:function(data){
        if(data != "" || data != null)
        {
            $('#parent_category').html(data);
        }else
        {
           alert("No data available");
        }
    
    },
    error:function(data)
        {
            return alert("Something went wrong");
        }
   });
   
  }

  function displayTreeviewList()
  {
   $.ajax({
    type:'post',
    url:"fetch.php",
    dataType:"json",
    success:function(data){
        if(data != "" || data != null)
        {
            $('#displayList').treeview({
                data:data
            });
        }
        else
        {
            alert("Sorry, No data available");
        }
    },
    error:function(data)
    {
        alert("Something went wrong");
    }
   })
  }


  function AddCategory()
  {
      var category_name=$("#category_name").val();
      if(category_name == "" || category_name == null)
      {
          return alert("Please enter category name");
      }
      var parent_category=$("#parent_category").val();
      if(parent_category == "0")
      {
     return alert("Please select valid parent category");
      }
      $.ajax({
        type:'post',
        dataType:"json",
        data:{category_name:category_name,parent_category:parent_category},
        url:'add.php',
        success:function(data)
        {
          if(data != "" || data != null)
          {
              alert("Category added successfully");
              FillParentDeatils();
          }
          else
          {
              alert("Data not added");
          }
        },
        error:function(data)
        {
            return alert("Something went wrong");
        }
      });
  }
</script>
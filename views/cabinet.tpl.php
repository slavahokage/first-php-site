
    <link rel="stylesheet" href="/css/admin/admin.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-2.2.4.js">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/js/admin/admin.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    function banUser(idOfUserToDelete,content) {
        var chbox = document.getElementById(content.id);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = callback;
        var url = "http://site/cabinet";
        xmlhttp.open("POST",url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var params = "ban="+chbox.checked+"&id="+idOfUserToDelete;
        xmlhttp.send(params);

        function callback() {
            if (xmlhttp.readyState ==4 && xmlhttp.status == 200){
            }
        }

    }

</script>

<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title ">Users</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <a type="button" class="btn btn-sm btn-primary btn-create" href="/cabinet/logout">Exit</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>

                            <th><em class="fa fa-cog"></em></th>
                            <th class="hidden-xs">ID</th>
                            <th>Login</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Email status</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">


                        <?php
                        foreach ($pageData['informationAboutUsers'] as $key => $value) {
                            echo "<tr>
                            <td align=\"center\">

                                <input type=\"checkbox\" id={$value['id']} name=\"feature\" value=\"scales\" unchecked onclick='banUser({$value['id']},this)' />
                                <label for=\"scales{$value['id']}\">Ban</label>
                                
                                <a class=\"btn btn-danger\" href=\"/cabinet?idForRemove={$value['id']}\"> <em class=\"fa fa-trash\"></em> </a>
                            
                                
                                
                            </td>   
                            <td class=\"hidden-xs\">{$value['id']}</td>
                            <td>{$value['login']}</td>
                            <td>{$value['password']}</td>
                            <td>{$value['email']}</td>
                            <td>{$value['email_status']}</td>

                        </tr>";
                        }
                        ?>

                        </tbody>
                     </table>

                 </div>
                 <div class="panel-footer">
                     <div class="row">

                         <div class="col col-xs-4">
                         </div>
                         <div class="col col-xs-8">
                             <ul class="pagination hidden-xs pull-right" id="myPager">
                             </ul>
                             <ul class="pagination visible-xs pull-right">
                                 <li><a href="#">«</a></li>
                                 <li><a href="#">»</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>

         </div></div></div>
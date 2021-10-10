<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <strong>Can logout using API :</strong> http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/logout || (pass the Authorization from the headers with the Bearer token)
    
    <h2>Pagination Data</h2>
    <h2>User : {{session('email')}}</h2>
   <table id="cities" border="1">
   </table>

    <span id="paging">
    </span>

</body>
<script>

    $(document).ready(function() {
        // let url = "http://127.0.0.1:8000/api/auth/getCityData";
        let url = "http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/getCityData";

        getUrl(url);
    });

    function getUrl(url) {
        let bearerToken = "<?php echo session('bearerToken'); ?>";
        // please add Bearer token, from the login api.Ex. Bearer <token>
        $.ajax({
            url: url,
            type: 'GET',
            contentType: 'application/json',
            headers: {                               
                'Authorization': 'Bearer '+ bearerToken
            },
            success: function (result) {
                    // CallBack(result);
                    //console.log(result.data[0]);
                    // console.log(result.json());
                let tableData =
                `<tr>
                <th>Id</th>
                <th>Zip</th>
                <th>name</th>
                <th>State</th>
                </tr>`;
                
                for (let city of result.data) {
                    tableData += `<tr>
                    <td>${city.id}</td>		
                    <td>${city.zip}</td>		
                    <td>${city.name}</td>		
                    <td>${city.state}</td>		
                    </tr>`;
                }
                
                // console.log(tableData);
                document.getElementById("cities").innerHTML = tableData;

                let pagelinks = '';
                for (let link of result.links) {
                    pagelinks += `<a href="javascript:;" id="pageLink" onclick='getUrl("${link.url}");'>${link.label}</a>&nbsp;&nbsp;`;
                }
                
                document.getElementById("paging").innerHTML = pagelinks;

            },
            error: function (error) {

            }
        });

    }

</script>

</html>
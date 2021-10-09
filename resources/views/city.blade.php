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
    <h2>Data will load when Bearer token updated</h2>

   <table id="cities" border="1">
   </table>

    <span id="paging">
    </span>

</body>
<script>

    
    $(document).ready(function() {
        let url = "http://127.0.0.1:8000/api/auth/getCityData";
        getUrl(url);
    });

    function getUrl(url) {
        // console.log(url);
        // alert(url);

        // please add Bearer token, from the login api.Ex. Bearer <token>
        $.ajax({
            url: url,
            type: 'GET',
            contentType: 'application/json',
            headers: {                               
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGlhdXRoLWVudi5lYmEtZWEyeWNleWsuYXAtc291dGgtMS5lbGFzdGljYmVhbnN0YWxrLmNvbVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzMzgxNjc1MSwiZXhwIjoxNjMzODIwMzUxLCJuYmYiOjE2MzM4MTY3NTEsImp0aSI6Ijh6Y2tkNlFkOUY5TXJjSFgiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.3-3n1vZIcpkl3G2aKB-9lQze4K8MZF4amjC5GSnLj4I'
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
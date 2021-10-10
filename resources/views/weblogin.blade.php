<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web login</title>
</head>
<body>
    <strong>New User can register with this API :</strong> http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/register 

    <br>
    <strong>Bearer token can get from this API :</strong> http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/login

    <br>
    <strong>Pagination data  can get from this API :</strong> http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/getCityData || (pass the Authorization from the headers with the Bearer token)
    <h2>Web login</h2> 

    <form action="userwelogin" method="POST">
        @csrf
        Email : <input type="text" name="email"> <br><br>
        Password : <input type="text" name="password"> <br><br>

        <button type="submit">Login</button>
    </form>

</body>
</html>
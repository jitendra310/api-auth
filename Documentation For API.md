Documentation For API
========================


http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/register
add users:

pass below parameter:
    email   
    password
    password_confirmation
    name
=======================================================================

http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/login
login:
    passs two parameter 
    email
    password

Here will receive bearer token, use this token for this API: getCityData , getdata
 ===========================================================================

http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/logout

logout:

pass one parameter from headers with POST request:
    Authorization => Bearer <token>


 ================================================================================

http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/getdata

pass one parameter from headers:
    Authorization => Bearer <token>

==============================================================================

http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/getCityData

pass one parameter from headers:
    Authorization => Bearer <token>

==============================================================================

For HTML view use this path: http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/citylist 


but need to pass manually bearer token in this file: \api-auth\resources\views\city.blade.php
in line no 36 in the headers.
for example : 

headers: {                               
                'Authorization': 'Bearer <token>'
                
================================================================================
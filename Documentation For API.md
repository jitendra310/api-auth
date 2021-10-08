Documentation For API
========================


http://127.0.0.1:8000/api/auth/register
add users:

pass below parameter:
    email   
    password
    password_confirmation
    name
=======================================================================

http://127.0.0.1:8000/api/auth/login
login:
    passs two parameter 
    email
    password

Here will receive bearer token, use this token for this API: getCityData , getdata
 ===========================================================================

http://127.0.0.1:8000/api/auth/getdata

pass one parameter from headers:
    Authorization => Bearer <token>

==============================================================================

http://127.0.0.1:8000/api/auth/getCityData

pass one parameter from headers:
    Authorization => Bearer <token>

==============================================================================

For HTML view use this path: http://127.0.0.1:8000/citylist 


but need to pass manually bearer token in this file: \api-auth\resources\views\city.blade.php
in line no 36 in the headers.
for example : 

headers: {                               
                'Authorization': 'Bearer <token>'
                
================================================================================
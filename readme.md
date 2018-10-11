
#Search and sort arguments:

URL: http://localhost:8000/api/library

Request headers

| **Required** 	| **Parameter**         | **Value**            						|
|----------	|------------------	|------------------						|
| Optional      | search	    	| string	 						|
| Optional      | sort		 	| title, isbn_number, author_first_name, year_of_creation   	|
| Optional 	| order		    	| asc,desc	     						|


#Insert:
Method: POST
URL: http://localhost:8000/api/library

| **Required** 	| **Parameter**         | **Value**          |
|------------	|--------------------	|------------------	 |
| yes           | title	    	        | string	 		 |
| yes           | isbn_number		 	| string|unique  	 |
| yes 	        | author_first_name		| string	     	 |
| yes 	        | author_last_name		| string	     	 |
| yes 	        | year_of_creation		| integer	     	 |


#Update:
Method: PUT
URL: http://localhost:8000/api/library/{id}

| **Required** 	| **Parameter**         | **Value**          |
|------------	|--------------------	|------------------	 |
| yes           | title	    	        | string	 		 |
| yes           | isbn_number		 	| string|unique  	 |
| yes 	        | author_first_name		| string	     	 |
| yes 	        | author_last_name		| string	     	 |
| yes 	        | year_of_creation		| integer	     	 |


#Delete:
Method: Delete
URL: http://localhost:8000/api/library/{id}

<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	include 'connection.php';
	$dbconnect=new DbConnection();
	$conn=$dbconnect->getConnection();
		if (!$conn) 
		{
		    die("Connection failed: " . $conn->connect_error);
		    echo json_encode("connection error");
		}
		else
		{
			if(isset($_POST["email"]))
			{
				$email=$_POST["email"];
				// $prefrences=$_POST["prefrences"];
				// foreach($prefrences as $value)
				// {
   	// 				$qtyOut = $value . "<br>";
				// }
				$sql="SELECT prefrences from details where email='$email'";
				$t=mysqli_query($conn,$sql);
				echo json_encode($t->fetch_assoc());
			}
			else
			{
				echo json_encode("attribute error");
			}
		}
		$conn->close();
}
else
{
	echo json_encode("query type error");
}



// from app request format
/*RequestParams parameter = new RequestParams();
 ArrayList<YourModelClass> yourSelectedArrayList=new ArrayList();//fill `this array according to your requirement`
 JSONObject jsonObject=null;
JSONArray jsonArray=new JSONArray();
 for (int i = 0; i < yourSelectedArrayList.size(); i++) {
                   jsonObject = new JSONObject();
                    try {

                        jsonObject.put("truckType",yourSelectedArrayList.get(i).getName());

                        jsonArray.put(jsonObject);
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }

parameter.put("",jsonArray.toString());*/

?>

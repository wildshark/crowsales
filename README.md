# crowsales
 Crow Sales

if($row == false){
            $output = false;
        }else{
            foreach($row as $r){
                $id = $r['catagory_id'];
                $catagory = $r['catagory'];
                $status = $r['status'];

                $sql="SELECT COUNT(product_id) AS total FROM products WHERE products.`status` <> 'Delete' AND products.catagory_id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([":id"=>$id]);
                $product = $sql->fetch();
                if($product == false){
                    $total = 0;
                }else{
                    $total = $product['total']; 
                }

                $output .=array(
                    "id"=>$id,
                    "catagory"=>$catagory,
                    "total"=>$total,
                    "status"=>$status
                );
            }
        }

        return $output;
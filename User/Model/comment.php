<?php 
    class Comment{
        public function insertComment($makh, $mahh, $comment){
            $db = new Connect();
            $query = "insert into comment(id_comment, idkh, idhanghoa, content, heart) values (Null, $makh, $mahh, '$comment', 0)";
            $db->exec($query);
        }

        function selectComment($idhh){
            $db = new Connect();
            $select = "select a.tenkh, b.content from khachhang a, comment b where a.makh = b.idkh and b.idhanghoa = $idhh";
            $result = $db->getList($select);
            return $result;
        }
    }
?>
<?php
    // THIS FILE CONTAINS PHP FUNCTIONS
    $host = 'localhost';
    $uname = 'id16878645_userformm';
    $pass = 'Mountaineerz2021@';
    $db_name = 'id16878645_userform';

    // Create connection using Object-Oriented MySQLi
    $conn = new mysqli($host, $uname, $pass, $db_name);

    // Check if error occured
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error . '!');
    }

    // Function to execute SELECT query, then return as array assoc
    function select($query)
    {
        global $conn;
        $data = $conn->query($query);
        $rows = [];

        if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    // Function to execute INSERT INTO query, return number of affected rows
    function insert($data, $type)
    {
        global $conn;
        $query = '';

        switch ($type) {
            case 'order' :
                $query  = "INSERT INTO order_t (nama_wstwn, email_wstwn, nohp_wstwn, jmlh_wstwn, schedule_id) VALUES ('{$data['nama_wstwn']}','{$data['email_wstwn']}','{$data['nohp_wstwn']}','{$data['jmlh_wstwn']}','{$data['schedule']}')";
                break;
            case 'schedule' :
                $gambar_wisata = $_FILES ['gambar_wisata']['name'];
                $query = "INSERT INTO schedule_t (nama_wisata, tanggal_wisata, kesulitan, lokasi_wisata, harga_wisata, narahubung, gambar_wisata) VALUES ('{$data['nama_wisata']}', '{$data['tanggal_wisata']}', '{$data['kesulitan']}', '{$data['lokasi_wisata']}', '{$data['harga_wisata']}', '{$data['narahubung']}', '$gambar_wisata')";
                $file_tmp = $_FILES ['gambar_wisata']['tmp_name'];
                move_uploaded_file($file_tmp, '../imgexplore/'.$gambar_wisata);
                break;
            case 'price' :
                $query = "INSERT INTO price_t (pricee, flight_code) VALUES ('{$data['pricee']}', '{$data['flight_code']}')";
                break;
        }

        $conn->query($query);

        return $conn->affected_rows;
    }

    // Function to execute UPDATE query, return number of affected rows
    function update($data, $type)
    {
        global $conn;
        $query = '';

        switch ($type) {
            case 'order' :
                $schedule = $data['schedule'] ?? $data['schedule_update'];
                $query = "UPDATE order_t SET nama_wstwn = '{$data['nama_wstwn']}', email_wstwn = '{$data['email_wstwn']}', nohp_wstwn = '{$data['nohp_wstwn']}', jmlh_wstwn = '{$data['jmlh_wstwn']}', schedule_id = '$schedule' WHERE order_id = '{$data['order_id']}'";
                break;
            case 'schedule' :
                $gambar_wisata = $_FILES ['gambar_wisata']['name'];
                $query = "UPDATE schedule_t SET nama_wisata = '{$data['nama_wisata']}', tanggal_wisata = '{$data['tanggal_wisata']}', kesulitan = '{$data['kesulitan']}', lokasi_wisata = '{$data['lokasi_wisata']}', harga_wisata = '{$data['harga_wisata']}', narahubung = '{$data['narahubung']}', gambar_wisata = '$gambar_wisata'  WHERE schedule_id = '{$data['schedule_id']}'";
                $file_tmp = $_FILES ['gambar_wisata']['tmp_name'];
                unlink('imgexplore/'.$gambar_wisata);
                move_uploaded_file($file_tmp, '../imgexplore/'.$gambar_wisata);
                break;
            case 'price' :
                $query = "UPDATE price_t SET pricee = '{$data['pricee']}', flight_code = '{$data['flight_code']}' WHERE price_id = '{$data['price_id']}'";
                break;
        }

        $conn->query($query);

        return $conn->affected_rows;
    }

    // Function to execute DELETE query, return number of affected rows
    function delete($id, $type)
    {
        global $conn;

        $query = "DELETE FROM {$type}_t WHERE {$type}_id = $id";

        $conn->query($query);

        return $conn->affected_rows;
    }
?>

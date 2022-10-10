<?php

class GenerosModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libreria;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de GENEROS.
     */
    function getAll() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM genero");
        $query->execute();

        // 3. obtengo los resultados
        $generos = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $generos;
        
        
    }

    function getGeneroById($id){
        $query = $this->db->prepare("SELECT id, genero FROM genero WHERE id = ?");
        $query->execute([$id]);
        // 3. obtengo el resultado
        $genero = $query->fetch(PDO::FETCH_OBJ); // devuelve un arreglo de objeto
        return $genero;
        
    }


    function deleteGeneroById($id) {
        $query = $this->db->prepare("DELETE FROM genero WHERE id = ?");
        $query->execute([$id]);
    }


    /**
     * Inserta una tarea en la base de datos.
     */
    public function saveGenero($genero) {
        $query = $this->db->prepare("INSERT INTO genero (genero) VALUES ( ?)");
        $query->execute([$genero]); 
    }
    
    function  updateGenero($genero, $id) {
        $query = $this->db->prepare("UPDATE genero SET genero = ? WHERE id = ?");
        $query->execute( [$genero, $id]);
    }
 
 
    
}

<?php

class LibrosModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libreria;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de libros.
     */
    function getAll() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM titulos");
        $query->execute();

        // 3. obtengo los resultados
        $libros = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $libros;
    }

    function getLibroById($id){
        $query = $this->db->prepare("SELECT id, obra, autor, precio, id_genero FROM titulos WHERE id = ?");
        $query->execute([$id]);

        // 3. obtengo el resultado
        $libro = $query->fetch(PDO::FETCH_OBJ); // devuelve un arreglo de objeto
        
        return $libro;
    }

    /**
     * Inserta una tarea en la base de datos.
     */
    public function saveRegister($obra, $autor, $precio, $genero) {
        $query = $this->db->prepare("INSERT INTO titulos (obra, autor, precio, id_genero) VALUES (?, ?, ?, ?)");
        $query->execute([$obra, $autor, $precio, $genero]);
    }


    /**
     * Elimina una tarea dado su id.
     */
    function deleteLibroById($id) {
        $query = $this->db->prepare('DELETE FROM titulos WHERE id = ?');
        $query->execute([$id]);
    }

    function updateLibro($obra, $autor, $precio, $genero, $id) {
        $query = $this->db->prepare("UPDATE titulos SET obra = ?, autor = ?, precio = ?, id_genero = ? WHERE id = ?");
        $query->execute([$obra, $autor, $precio, $genero, $id]);
    }

    function getLibroByIdGenero($id_genero){
        $query = $this->db->prepare("SELECT id, obra, autor, precio, id_genero FROM titulos WHERE id_genero = ?");
        $query->execute([$id_genero]);

        // 3. obtengo el resultado
        $libros = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objeto
        
        return $libros;
    }
}

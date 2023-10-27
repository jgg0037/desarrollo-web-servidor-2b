<?php
class Videojuego{
    public int $id_videojuego;
    public string $titulo;
    public string $compania;
    public string $pegi;

    function __construct(int $id_videojuego, string $titulo, string $compania, string $pegi){
        $this -> id_videojuego = $id_videojuego;
        $this ->titulo = $titulo;
        $this ->compania = $compania;
        $this ->pegi = $pegi;
    }

}
?>
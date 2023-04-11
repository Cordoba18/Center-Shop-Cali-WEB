<?php
  
class Usuario{

    private $nombre;
    private $discoteca;
    private $correo;
    private $contrasena;
    private $id;
    private $cedula;

    private $personas;
    private $cumpleaños;

   
    public function getNombre()
    {
        return $this->nombre;
    }

   
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

   
    public function getCorreo()
    {
        return $this->correo;
    }

    
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

   
    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    

 
    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


  
    public function getCedula()
    {
        return $this->cedula;
    }

    
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

  
    public function getPersonas()
    {
        return $this->personas;
    }

  
    public function setPersonas($personas)
    {
        $this->personas = $personas;

        return $this;
    }

    
    public function getCumpleaños()
    {
        return $this->cumpleaños;
    }

   
    public function setCumpleaños($cumpleaños)
    {
        $this->cumpleaños = $cumpleaños;

        return $this;
    }


    public function getDiscoteca()
    {
        return $this->discoteca;
    }

    public function setDiscoteca($discoteca)
    {
        $this->discoteca = $discoteca;

        return $this;
    }
}

?>
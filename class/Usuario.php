<?php


class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    
    public function setIdUsuario($value) {
        $this->idusuario = $value;
    }

    public function getIdUsuario() {
        return $this->idusuario;
    }

    public function setDesLogin($value) {
        $this->deslogin = $value;
    }

    public function getDesLogin() {
        return $this->deslogin;
    }

    public function setDesSenha($value) {
        $this->dessenha = $value;
    }

    public function getDesSenha() {
        return $this->dessenha;
    }

    public function setDtCadastro($value) {
        $this->dtcadastro= $value;
    }

    public function getDtCadastro() {
        return $this->dtcadastro;
    }
    
    public function loadByID($id) {

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
        ":ID"=>$id
        ));
        if (count($result) > 0) {

            $row = $result[0];

            $this->setIdUsuario($row['idusuario']);
            $this->setDesLogin($row['deslogin']);
            $this->setDesSenha($row['dessenha']);
            $this->setDtCadastro(new DateTime($row['dtcadastro']));
        }

    }

    public function __toString() {

        return json_encode(array(
            "idusuario"=>$this->getIdUsuario,
            "deslogin"=>$this->getDesLogin,
            "dessenha"=>$this->getDesSenha,
            "dtcadastro"=>$this->getDtCadastro //->format("d/n/Y H:i:s") -> Conflitante
        ));
    }


}

?>
<?php
class MotoModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=concesionaria;charset=utf8', 'root', '');
    }

    // Listar todas las motos (con filtros y orden opcionales)
    public function getMotos($categoria = null, $orderBy = null, $direction = null)
    {
        $sql = 'SELECT m.*, c.tipo_nombre AS categoria_nombre
                FROM motos m
                INNER JOIN categorias c ON m.id_tipo = c.id_tipo';

        if ($categoria) {
            $sql .= ' WHERE c.tipo_nombre = ?';
        }

        if ($orderBy) {
            $sql .= " ORDER BY $orderBy";
            if ($direction) {
                $sql .= " $direction";
            }
        }

        $query = $this->db->prepare($sql);

        if ($categoria) {
            $query->execute([$categoria]);
        } else {
            $query->execute();
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Listar con paginación
    public function getMotosPaginado($categoria = null, $orderBy = null, $direction = null, $pagina = 1, $limit = 5)
    {
        $sql = 'SELECT m.*, c.tipo_nombre AS categoria_nombre
            FROM motos m
            INNER JOIN categorias c ON m.id_tipo = c.id_tipo';

        if ($categoria) {
            $sql .= ' WHERE c.tipo_nombre = :categoria';
        }

        if ($orderBy) {
            $sql .= " ORDER BY $orderBy";
            if ($direction) {
                $sql .= " $direction";
            }
        }

        $offset = ($pagina - 1) * $limit;
        $sql .= " LIMIT :limit OFFSET :offset";

        $query = $this->db->prepare($sql);

        if ($categoria) {
            $query->bindValue(':categoria', $categoria, PDO::PARAM_STR);
        }

        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function countRows()
    {
        $query = $this->db->prepare('SELECT COUNT(*) AS total FROM motos');
        $query->execute();
        $total = $query->fetch(PDO::FETCH_OBJ);
        return $total->total;
    }

    public function getMoto($id)
    {
        $query = $this->db->prepare('SELECT m.*, c.tipo_nombre AS categoria_nombre
                                     FROM motos m
                                     INNER JOIN categorias c ON m.id_tipo = c.id_tipo
                                     WHERE m.id_moto = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertMoto($modelo, $caracteristicas, $precio, $id_tipo)
    {
        $query = $this->db->prepare('INSERT INTO motos (modelo, caracteristicas, precio, id_tipo) VALUES (?, ?, ?, ?)');
        $query->execute([$modelo, $caracteristicas, $precio, $id_tipo]);
        return $this->db->lastInsertId();
    }

    public function updateMoto($id_moto, $modelo, $caracteristicas, $precio, $id_tipo)
    {
        $query = $this->db->prepare('UPDATE motos SET modelo=?, caracteristicas=?, precio=?, id_tipo=? WHERE id_moto=?');
        $query->execute([$modelo, $precio, $caracteristicas, $id_tipo, $id_moto]);
        return $id_moto;
    }

    public function deleteMoto($id_moto)
    {
        $query = $this->db->prepare('DELETE FROM motos WHERE id_moto = ?');
        $query->execute([$id_moto]);
    }
}



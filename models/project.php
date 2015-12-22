<?php

class Project extends Model{

    public function getListKo($hidden = false){
        $sql = "select * from projects where department = 'ko'";
        if ( $hidden ){
            $sql .= " hidden = 1";
        }
        return $this->db->query($sql);
    }

    public function getByKoDescription($name){
        $alias = $this->db->escape($name);
        $sql = "select * from projects where name = '{$name}' and department = 'ko'  limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getByKoId($id){
        $id = (int)$id;
        $sql = "select * from projects where id = '{$id}' and department = 'ko' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getListVk($hidden = false){
        $sql = "select * from projects where department = 'vk'";
        if ( $hidden ){
            $sql .= " hidden = 1";
        }
        return $this->db->query($sql);
    }

    public function getByVkDescription($name){
        $alias = $this->db->escape($name);
        $sql = "select * from projects where name = '{$name}' and department = 'vk'  limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getByVkId($id){
        $id = (int)$id;
        $sql = "select * from projects where id = '{$id}' and department = 'vk' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function save($data, $id = null){
        if ( !isset($data['name']) || !isset($data['description']) || !isset($data['date']) || !isset($data['link_file']) || !isset($data['department']) || !isset($data['hidden']) ){
            return false;
        }

        $id = (int)$id;
        $name = $this->db->escape($data['alias']);
        $description = $this->db->escape($data['description']);
        $date = $this->db->escape($data['date']);
        $link_file= $this->db->escape($data['link_file']);
        $department = $this->db->escape($data['department']);
        $hidden = isset($data['hidden']) ? 1 : 0;

        if ( !$id ){ // Add new record
            $sql = "
                insert into projects
                   set name = '{$name}',
                       description = '{$description}',
                       date = '{$date}',
                       link_file = '{$link_file}',
                       department = '{$department}',
                       hidden = {$hidden}
            ";
        } else { // Update existing record
            $sql = "
                update projects
                   set name = '{$name}',
                       description = '{$description}',
                       date = '{$date}',
                       link_file = '{$link_file}',
                       department = '{$department}',
                       hidden = {$hidden}
            ";
        }

        return $this->db->query($sql);
    }

    public function delete($id){
        $id = (int)$id;
        $sql = "delete from projects where id = {$id}";
        return $this->db->query($sql);
    }

}
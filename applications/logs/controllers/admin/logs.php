<?php
namespace admin\logs;

class logs extends \Admin {

    var $limit = 20;

    function default_method($type=false)
    {
        if (!$type) $type = 'login';

        if (!isset($_POST['on_page'])) $on_page = $this->limit;
        else $on_page = $_POST['on_page'];

        if ($type == "login")
        {
            $query = $this->db->prepare("delete from logs where type='login' and date <= ?");
            $query->execute(array(time()-60*60*24*90));
        }

        if (isset($_POST['search']) && $_POST['search'] != '')
        {
            $s = $this->db->quote("%{$_POST['search']}%");
            $sql[] = "(l.message LIKE ".$s." OR l.ip LIKE ".$s." OR u.fio LIKE ".$s.")";
        }

        if ($_POST['type']) $sql[] = "l.title=".$this->db->quote($_POST['type']);

        if (count($sql) > 0) $sql = " and ".implode(" and ",$sql);

        $total= $this->db->num_rows("logs as l LEFT JOIN users as u ON l.user=u.id_user where l.type='{$type}' {$sql}");

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $on_page);
        if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $on_page);

        $query = $this->db->query("select l.*,u.fio,g.color from logs as l
                LEFT JOIN users as u ON l.user=u.id_user
                LEFT JOIN groups as g ON g.id=u.id_group
                where l.type='{$type}' {$sql}
                ORDER BY date DESC,id DESC LIMIT {$on_page} OFFSET {$paginator->get_range('from')}");
        while ($row = $query->fetch())
        {
            $row['GET'] = print_r(unserialize($row['GET']),true);
            $row['POST'] = print_r(unserialize($row['POST']),true);
            $logs[] = $row;
        }

        $query = $this->db->query("select distinct title from logs where type='{$type}'");
        $types[] = "";
        while ($row = $query->fetch())
        {
            $types[$row['title']] = $row['title'];
        }

        $form = array(
            'type' => array('label' => 'Тип логов','type' => 'select', 'options' => $types),
            'on_page' => array('label' => 'Показывать по','type' => 'select', 'options' => array('15' => '15','20' => '20','50' => '50','100' => '100'), 'selected' => $on_page),
        );

        $data = array('logs'=> $logs, 'total'=> $total,'paginator' => $paginator,'form' => $form,'type' => $type);

        if (!isset($_POST['page']))
        {
            $this->layout_show('admin/index.html',$data);
        }
        else
        {
            $res['success'] = $this->layout_get('admin/table.html',$data);
            echo json_encode($res);
        }
    }
}


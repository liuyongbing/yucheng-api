<?php
namespace App\Repositories;

use App\Models\Categories;

class CategoriesRepository extends Repository
{
    public function init()
    {
        $this->model = new Categories();
    }
    
    /**
     * 列表
     *
     * @param array $params
     * @return array
     */
    public function list($conditions, $offset = 0, $limit = 10, $order = [])
    {
        $result = parent::list($conditions, $offset, $limit, $order);
        
        $data = [];
        if (!empty($result['list']))
        {
            foreach ($result['list'] as $item)
            {
                $data[$item['id']] = $item;
            }
        }
        
        return [
            'total' => $result['total'],
            'list' => $data
        ];
    }
}
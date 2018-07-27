<?php
namespace App\Repositories;

use App\Models\Coursewares;

class CoursewaresRepository extends Repository
{
    public function init()
    {
        $this->model = new Coursewares();
    }
    
    /**
     * 新增
     *
     * @param array $data
     * @return \App\Models\BasicModel
     */
    public function store($data)
    {
        $item = $this->model;
        
        $item->course_id    = (int)$data['course_id'];
        $item->file_ppt     = $this->formatFilePpt($data);
        $item->file_music   = !empty($data['file_music'])   ? $data['file_music']   : '';
        $item->file_video   = !empty($data['file_video'])   ? $data['file_video']   : '';
        $item->class_number = !empty($data['class_number']) ? (int)$data['class_number'] : 1;
        $item->status = 1;
        
        $item->save();
        
        return $item;
    }
    
    /**
     * 修改
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\BasicModel
     */
    public function update($id, $data = [])
    {
        $data['file_ppt'] = $this->formatFilePpt($data);
        
        return parent::update($id, $data);
    }
    
    /**
     * 列表
     *
     * @param array $params
     * @return array
     */
    public function list($conditions, $offset = 0, $limit = 10, $order = [])
    {
        $query = $this->model->where($conditions)->where('status', '>=', 0);
        
        $count = $query->count();
        
        if (!empty($order))
        {
            if (is_array($order))
            {
                foreach ($order as $column => $type)
                {
                    $query = $query->orderBy($column, $type);
                }
            }
            else
            {
                $query = $query->orderBy($order);
            }
        }
        
        $items = $query->skip($offset)->take($limit)->get();
        
        return [
                'total' => $count,
                'list' => $items
        ];
    }
    
    /**
     * All
     *
     * @param array $params
     * @return array
     */
    public function all($conditions, $order = [])
    {
        $query = $this->model->where($conditions)->where('status', '>=', 0);
        
        $count = $query->count();
        
        if (!empty($order))
        {
            if (is_array($order))
            {
                foreach ($order as $column => $type)
                {
                    $query = $query->orderBy($column, $type);
                }
            }
            else
            {
                $query = $query->orderBy($order);
            }
        }
        
        $items = $query->get();
        
        return [
                'total' => $count,
                'list' => $items
        ];
    }
    
    protected function formatFilePpt($data, $filetype = 'kejian', $brand = 'pocketcat')
    {
        $filename = '';
        
        if (!empty($data['upload_ppt_filename']))
        {
            $file = env('FTP_FILE_FOLDER') . $filetype . '/' . $brand . '/' . $data['upload_ppt_filename'];
            if (file_exists($file))
            {
                $filename = $filetype . '/' . $brand . '/' . $data['upload_ppt_filename'];
                /* $types = explode('.', $file);
                 $ext = end($types);
                 // 上传文件
                 $filehash = md5_file($file);
                 $dirPrefix = substr($filehash, 0, 2) . '/' . substr($filehash, 2, 2) . '/';
                 $filename = $dirPrefix . $filehash . '.' . $ext;
                 
                 $pathname = env('STORAGE_FILE_FOLDER') . $filetype . '/' . $dirPrefix;
                 if (!is_dir($pathname))
                 {
                 mkdir($pathname, true);
                 }
                 $command = "mv $file $pathname/$filehash.$ext";
                 system($command); */
                //Storage::disk('public')->put($filetype . '/' . $filename, file_get_contents($file));
            }
        }
        elseif (!empty($data['file_ppt']))
        {
            $filename = $data['file_ppt'];
        }
        
        return $filename;
    }
}
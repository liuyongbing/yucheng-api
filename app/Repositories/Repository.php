<?php
namespace App\Repositories;

use App\Helpers\SystemHelper;

class Repository
{
    protected function responseError($errorCode)
    {
        $errorMessage = SystemHelper::getResponseErrorMessage($errorCode);
        throw new \Exception($errorMessage, $errorCode);
    }

    /**
     * 处理排序
     * 例如： $orderBy = id:asc|position:desc
     * @param $orderBy
     * @return array
     */
    protected function _processOrderBy($orderBy)
    {
        $orderBy = explode('|', $orderBy);
        
        foreach ($orderBy as $k => $v) {
            $orderBy[$k] = explode(':', $v);
        }

        return $orderBy;
    }
}
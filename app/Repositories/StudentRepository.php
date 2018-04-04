<?php
namespace App\Repositories;

use App\Models\Student;

class StudentRepository extends Repository
{
    public function getById($id)
    {
        $item = Student::find($id);
        
        return $item;
    }

    public function list($params)
    {
        $query = Student::where($params);
        
        $count = $query->count();
        //$items = $query->skip($offset)->take($limit)->get();
        $items = $query->get();

        return [
            'list' => $items,
            'total' => $count
        ];
    }
    
    public function store($name, $nationality, $visibility, $last_update_admin_id)
    {
        $company = new Company();
        $company->name = $name;
        $company->nationality = $nationality;
        $company->visibility = $visibility;
        $company->last_update_admin_id = $last_update_admin_id;
        $company->save();

        return $company;
    }

    public function update($id, $name, $nationality, $visibility, $last_update_admin_id)
    {
        $company = Company::find($id);
        $company->name = $name;
        $company->nationality = $nationality;
        $company->visibility = $visibility;
        $company->last_update_admin_id = $last_update_admin_id;
        $company->save();

        return $company;
    }

    public function getUserCountByCompanyId($company_id)
    {
        return UserProfile::where('company_id', $company_id)->count();
    } 
    
}
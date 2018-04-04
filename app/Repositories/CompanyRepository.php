<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Crypt;
use App\Models\Company;
use App\Models\UserProfile;

class CompanyRepository extends Repository
{
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

    public function index($offset, $limit, $visibility, $params=[])
    {
        $name = array_pull($params, 'name', '');
        $query = Company::where($params);
        if($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        if(null != $visibility) {
            $query->where('visibility', $visibility);
            $query->orderBy('id', 'desc');
        } else {
            $query->orderBy('id');
        }
        $count = $query->count();
        $companies = $query->skip($offset)->take($limit)->get();

        return [
            'count' => $count,
            'list' => $companies
        ];
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
    
    public function show($id)
    {
        $company = Company::find($id)->toArray();
        $company['user_count'] = $this->getUserCountByCompanyId($id);
        
        return  $company;
    }

    public function getUserCountByCompanyId($company_id)
    {
        return UserProfile::where('company_id', $company_id)->count();
    } 
    
}
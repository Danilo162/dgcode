<?php
/**
 * Created by PhpStorm.
 * User: salioudiabate
 * Date: 07/06/2019
 * Time: 22:36
 */

namespace App\Models;


trait Feature
{


    /**
     * Determine if the user may perform the given permission.
     *
     * @paramPermission $permission
     * @returnboolean
     */
    public function hasPermissionTo(Permission $permission,$type=null)
    {
        return $this->hasPermissionThroughRole($permission,$type);
    }

    /**
     * @param$permission
     * @returnbool
     */
    protected function hasPermissionThroughRole($permission)
    {
      /*  if($type=="role"){*/
            foreach ($permission->roles as $role) {

                if(!$this->role()->first()->id){

                }else{
                    if ($this->role()->first()->id == $role->id) {
                        return true;
                    }
                };
               // dd($this->role()->first(),$role->id);

            }
       /* }*/

     /*   if($type=="user") {*/

            foreach ($permission->users as $user) {
                if (auth()->user()->id == $user->id) {
                    return true;
                }
            }
      /*  }*/
        return false;
    }


    private function hasRole($role)
    {  //  dd($role,auth()->user()->role_id);
        $role = Role::where("id","=",$role)->firstOrFail();

        return auth()->user()->role_id == $role->id;
    }

    public function isSuperAdmin()
    {
        return $this->hasRole(1);
    }
    public function isAdmin()
    {
        return $this->hasRole(2);
    }





    public static function  getRole() {
            $name = "";
                $query =  Role::where('id', '=', auth()->user()->role_id)->first();
                if($query){
                $name = $query->name;
                }

                return $name;
    }
    public static function  getUserName($id) {
            $name = "";
                $query =  User::where('id', '=',$id)->first();
                if($query){
                $name = $query->name ;
                }
                return $name;

    }

}

<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'NumberOne']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Manager']);
        $role4 = Role::create(['name' => 'Blogger']);
        $role5 = Role::create(['name' => 'Planner']);
        $role6 = Role::create(['name' => 'User']);

        Permission::create(['name' => 'admin.zonas.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.zonas.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.zonas.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.zonas.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.groups.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.groups.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.groups.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.groups.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1, $role2]);
    //  Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.permissions.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.permissions.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.permissions.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.permissions.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.roles.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1, $role2,$role3, $role4]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.comments.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'admin.ofertas.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.ofertas.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.ofertas.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.ofertas.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.servicios.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.servicios.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.servicios.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.servicios.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.grupo_equipos.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_equipos.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_equipos.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_equipos.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.grupo_materials.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_materials.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_materials.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_materials.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.grupo_obreros.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_obreros.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_obreros.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_obreros.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.equipos.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.equipos.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.equipos.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.equipos.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.materials.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.materials.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.materials.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.materials.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.obreros.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.obreros.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.obreros.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.obreros.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.transportes.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.transportes.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.transportes.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.transportes.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.generals.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.generals.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.generals.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.generals.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.indirectos.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indirectos.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indirectos.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indirectos.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.indices.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indices.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indices.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indices.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.precios.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.precios.create'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.precios.edit'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.precios.destroy'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'admin.presupuestos.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.presupuestos.create'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.presupuestos.edit'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.presupuestos.destroy'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        // create permissions
        //Permission::create(['name' => 'Administer roles & permissions']);
        //Permission::create(['name' => 'Create Post']);
        //Permission::create(['name' => 'Edit Post']);
        //Permission::create(['name' => 'Delete Post']);
        //Permission::create(['name' => 'Publish Post']);
        //Permission::create(['name' => 'Unpublish Post']);
        //Permission::create(['name' => 'Comment Post']);

        // create roles and assign existing permissions
        //$role = Role::create(['name' => 'admin']);
        //$role->givePermissionTo(['Administer roles & permissions', 'Create Post', 'Edit Post', 'Delete Post',  'Publish //Post', 'Unpublish Post', 'Comment Post']);

        //$role = Role::create(['name' => 'user']);
        //$role->givePermissionTo('Comment Post');

        //$role = Role::create(['name' => 'writer']);
        //$role->givePermissionTo('Create Post');
    }
}

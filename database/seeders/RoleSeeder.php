<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ROLES
            $role1 = Role::create(['name' => 'Propietario']);
            $role2 = Role::create(['name' => 'Interlocutor']);
            $role3 = Role::create(['name' => 'Usuario']);
            $role4 = Role::create(['name' => 'Gerente General']);
            $role5 = Role::create(['name' => 'Jefatura Administrativa']);
            $role6 = Role::create(['name' => 'Jefe de Operaciones']);
            $role7 = Role::create(['name' => 'Jefe Comercial']);
            $role8 = Role::create(['name' => 'Logistica']);
            $role9 = Role::create(['name' => 'Costos y Presupuestos']);
            $role10 = Role::create(['name' => 'Administrador de Contrato']);
            $role11 = Role::create(['name' => 'Supervisor']);
            $role12 = Role::create(['name' => 'Service Desk']);
            $role13 = Role::create(['name' => 'Tecnico']);
            $role14 = Role::create(['name' => 'Proveedor']);
            $role15 = Role::create(['name' => 'ADMIN TI']);
            $role16 = Role::create(['name' => 'PERSON SSOMA']);

        //FIN ROLES


        //PERMISOS

            //NAV BARD (TITULO)
            //DASHBOARD
            Permission::create(['name' => 'menu.titulo.dashboard'])->syncRoles([$role4,$role5,$role6,$role8,$role10,$role12,$role15]);

                //SUBTITULO PROVEEDOR
                    Permission::create(['name' => 'menu.proveedor'])->syncRoles([$role4,$role5,$role6,$role8,$role10,$role12,$role15]);

                    //PROVEEDOR
                    Permission::create(['name' => 'menu.item.proveedor.proveedor'])->syncRoles([$role8,$role10,$role12,$role15]);
                    //OMOLOGADO
                    Permission::create(['name' => 'menu.item.proveedor.omologado'])->syncRoles([$role8,$role15]);


                    /* OMOLOGADOS VISTA Y CRUD */
                    Permission::create(['name' => 'omologado.view'])->syncRoles([$role8,$role15]);
                    Permission::create(['name' => 'omologado.nuevo'])->syncRoles([$role8,$role15]);
                    Permission::create(['name' => 'omologado.editar'])->syncRoles([$role8,$role15]);
                    Permission::create(['name' => 'omologado.eliminar'])->syncRoles([$role15]);

                    /* PROVEEDOR VISTA Y CRUD */
                    Permission::create(['name' => 'proveedor.view'])->syncRoles([$role4,$role5,$role6,$role8,$role10,$role12,$role15]);
                    Permission::create(['name' => 'proveedor.nuevo'])->syncRoles([$role8,$role15]);
                    Permission::create(['name' => 'proveedor.editar'])->syncRoles([$role8,$role15]);
                    Permission::create(['name' => 'proveedor.eliminar'])->syncRoles([$role15]);
                //


                //SUBTITULO CATEGORIA
                    Permission::create(['name' => 'menu.categoria'])->syncRoles([$role15]);

                    //CATEGORIA CUENTA
                    Permission::create(['name' => 'menu.item.categoria.categoria.cuenta'])->syncRoles([$role15]);

                    //CATEGORIA DOCUMENTACION
                    Permission::create(['name' => 'menu.item.categoria.categoria.documentacion'])->syncRoles([$role15]);

                    //CATEGORIA CONTINGENCIA
                    Permission::create(['name' => 'menu.item.categoria.categoria.contingencia'])->syncRoles([$role15]);

                    //ESPECIALIDAD HT
                    Permission::create(['name' => 'menu.item.categoria.especialidad.ht'])->syncRoles([$role15]);

                    //CARGOS
                    Permission::create(['name' => 'menu.item.categoria.cargos'])->syncRoles([$role15]);

                    /* CATEGORIA CUENTA VISTA Y CRUD */
                    Permission::create(['name' => 'categoria.cuenta.view'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.cuenta.nuevo'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.cuenta.editar'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.cuenta.eliminar'])->syncRoles([$role15]);

                    /* CATEGORIA DOCUMENTACION VISTA Y CRUD */
                    Permission::create(['name' => 'categoria.documentacion.view'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.documentacion.nuevo'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.documentacion.editar'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.documentacion.eliminar'])->syncRoles([$role15]);

                    /* CATEGORIA CONTINGENCIA VISTA Y CRUD */
                    Permission::create(['name' => 'categoria.contingencia.view'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.contingencia.nuevo'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.contingencia.editar'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.contingencia.eliminar'])->syncRoles([$role15]);

                    /* ESPECIALIDAD HT VISTA Y CRUD */
                    Permission::create(['name' => 'categoria.especialidadht.view'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.especialidadht.nuevo'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.especialidadht.editar'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.especialidadht.eliminar'])->syncRoles([$role15]);

                    /* CARGOS VISTA Y CRUD */
                    Permission::create(['name' => 'categoria.cargos.view'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.cargos.nuevo'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.cargos.editar'])->syncRoles([$role15]);
                    Permission::create(['name' => 'categoria.cargos.eliminar'])->syncRoles([$role15]);
                //
            
            //
            
            //GESTION OPERATIVA
                Permission::create(['name' => 'menu.titulo.gestion.operativa'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7,$role9,$role10,$role12,$role15]);

                //SUBTITULO CUENTAS
                Permission::create(['name' => 'menu.cuentas'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7,$role9,$role10,$role12,$role15]);

                    /* CUENTAS VISTA Y CRUD */
                    Permission::create(['name' => 'cuentas.view'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7,$role9,$role10,$role12,$role15]);
                    Permission::create(['name' => 'cuentas.nuevo'])->syncRoles([$role7,$role15]);
                    Permission::create(['name' => 'cuentas.eliminar'])->syncRoles([$role15]);

                    Permission::create(['name' => 'button.cuentas.show'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7,$role9,$role10,$role12,$role15]);

                        /* SHOW CUENTAS GENERAL */
                        Permission::create(['name' => 'vista.show.cuentas'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7,$role9,$role10,$role12,$role15]);
                        Permission::create(['name' => 'button.verht'])->syncRoles([[$role1,$role2,$role4,$role5,$role6,$role7,$role9,$role10,$role12,$role15]]);  //************************************************** */

                            //SECCIONES
                                /* DOCUMENTOS COMERCIALES VISTA Y CRUD */
                                Permission::create(['name' => 'cuenta.documento.view.seccion'])->syncRoles([$role1,$role2,$role4,$role5,$role7,$role15]);
                                Permission::create(['name' => 'cuenta.documento.nuevo'])->syncRoles([$role7,$role15]);
                                Permission::create(['name' => 'cuenta.documento.editar'])->syncRoles([$role7,$role15]);
                                Permission::create(['name' => 'cuenta.documento.eliminar'])->syncRoles([$role15]);

                                /* DATOS DE CUENTA VISTA Y CRUD */
                                Permission::create(['name' => 'cuenta.datoscuenta.view.seccion'])->syncRoles([$role1,$role4,$role5,$role6,$role7,$role9,$role10,$role12,$role15]);
                                Permission::create(['name' => 'cuenta.datoscuenta.editar'])->syncRoles([$role7,$role15]);

                                /* INTERLOCUTOR VISTA Y CRUD */
                                Permission::create(['name' => 'cuenta.interlocutor.view.seccion'])->syncRoles([$role1,$role4,$role5,$role6,$role7,$role10,$role12,$role15]);
                                Permission::create(['name' => 'cuenta.interlocutor.nuevo'])->syncRoles([$role7,$role15]);
                                Permission::create(['name' => 'cuenta.interlocutor.editar'])->syncRoles([$role7,$role15]);
                                Permission::create(['name' => 'cuenta.interlocutor.eliminar'])->syncRoles([$role15]);

                                /* COLABORADOR VISTA Y CRUD */
                                Permission::create(['name' => 'cuenta.colaborador.view.seccion'])->syncRoles([$role4,$role5,$role6,$role10,$role12,$role15]);
                                Permission::create(['name' => 'cuenta.colaborador.nuevo'])->syncRoles([$role10,$role15]);
                                Permission::create(['name' => 'cuenta.colaborador.editar'])->syncRoles([$role10,$role15]);
                                Permission::create(['name' => 'cuenta.colaborador.eliminar'])->syncRoles([$role15]);

                                /* SEDES VISTA Y CRUD */
                                Permission::create(['name' => 'cuenta.sedes.view.seccion'])->syncRoles([$role1,$role4,$role5,$role6,$role7,$role9,$role10,$role12,$role15]);
                                Permission::create(['name' => 'cuenta.sedes.nuevo'])->syncRoles([$role7,$role15]);
                                Permission::create(['name' => 'cuenta.sedes.editar'])->syncRoles([$role7,$role15]);
                                Permission::create(['name' => 'cuenta.sedes.eliminar'])->syncRoles([$role15]);
                            // FIN SECCIONES

                                /* SHOW HT CUENTA (VER HT) */
                                Permission::create(['name' => 'vista.show.htcuenta'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7,$role9,$role10,$role12,$role15]);
                                Permission::create(['name' => 'button.cronogramapam.show'])->syncRoles([]);  //************************************************** */

                                    /* CONTINGENCIA VISTA Y CRUD */
                                    Permission::create(['name' => 'htcuenta.contingencia.view.seccion'])->syncRoles([$role1,$role4,$role5,$role6,$role9,$role10,$role12,$role15]);
                                    Permission::create(['name' => 'ht.contingencia.nuevo'])->syncRoles([$role9,$role15]);
                                    Permission::create(['name' => 'ht.contingencia.editar'])->syncRoles([$role9,$role15]);
                                    Permission::create(['name' => 'ht.contingencia.eliminar'])->syncRoles([$role15]);
                                    Permission::create(['name' => 'ht.contingencia.vista.columna.saldo'])->syncRoles([$role4,$role5,$role6,$role9,$role15]);

                                    /* HT ESTRUCTURA VISTA Y CRUD */
                                    Permission::create(['name' => 'htcuenta.htestructura.view.seccion'])->syncRoles([$role1,$role4,$role5,$role6,$role9,$role10,$role12,$role15]);
                                    Permission::create(['name' => 'ht.htestructura.nuevo'])->syncRoles([$role9,$role15]);
                                    Permission::create(['name' => 'ht.button.htestructura.show'])->syncRoles([$role1,$role4,$role5,$role6,$role9,$role10,$role12,$role15]);
                                    Permission::create(['name' => 'ht.htestructura.editar'])->syncRoles([$role9,$role15]);
                                    Permission::create(['name' => 'ht.htestructura.eliminar'])->syncRoles([$role15]);
                                    Permission::create(['name' => 'ht.htestructura.vista.columna.costo'])->syncRoles([$role4,$role5,$role6,$role9,$role10,$role15]);
                                    Permission::create(['name' => 'ht.htestructura.vista.columna.precio'])->syncRoles([$role1,$role4,$role5,$role6,$role9,$role10,$role15]);

                                        /* CRONOGRAMA PAM GLOBAL */
                                        Permission::create(['name' => 'vista.show.cronogramapamglobal'])->syncRoles([$role1,$role4,$role5,$role6,$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'button.cronogramapamglobal.nuevo'])->syncRoles([$role6,$role10,$role15]);  /* ******* */
                                        Permission::create(['name' => 'cronogramapamglobal.editar'])->syncRoles([$role6,$role10,$role15]);  /* ******* */
                                        Permission::create(['name' => 'button.cronogramapamglobal.show.ejecucion'])->syncRoles([$role1,$role4,$role5,$role6,$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'cronogramapamglobal.eliminar'])->syncRoles([$role15]);  /* ******* */

                                        /* CRONOGRAMA PAM INDIVIDUAL */
                                        Permission::create(['name' => 'vista.show.cronogramapam.individual'])->syncRoles([$role1,$role4,$role5,$role6,$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'button.cronogramapam.individual.nuevo'])->syncRoles([$role6,$role10,$role15]);  /* ******* */
                                        Permission::create(['name' => 'cronogramapam.individual.editar'])->syncRoles([$role6,$role10,$role15]);  /* ******* */
                                        Permission::create(['name' => 'button.cronogramapam.individual.show.ejecucion'])->syncRoles([$role1,$role4,$role5,$role6,$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'cronogramapam.individual.eliminar'])->syncRoles([$role15]);  /* ******* */

                                            /* EJECUCION CRONOGRAMA PAM  */
                                            Permission::create(['name' => 'vista.show.ejecucion.pam'])->syncRoles([]);  /* ******* */
                                            Permission::create(['name' => 'ejecucion.pam.costo'])->syncRoles([$role4,$role5,$role6,$role10,$role12,$role15]);  /* ******* */
                                            Permission::create(['name' => 'ejecucion.pam.precio'])->syncRoles([$role1,$role4,$role5,$role6,$role10,$role12,$role15]);  /* ******* */
                                            Permission::create(['name' => 'ejecucion.pam.button.crear'])->syncRoles([$role10,$role12,$role15]);  /* ******* */
                                            Permission::create(['name' => 'ejecucion.pam.button.actualizar'])->syncRoles([$role10,$role12,$role15]);  /* ******* */
                                            Permission::create(['name' => 'ejecucion.pam.button.facturar'])->syncRoles([$role10,$role12,$role15]);  /* ******* */
                                            Permission::create(['name' => 'ejecucion.pam.button.nofacturar'])->syncRoles([$role15]);  /* ******* */
            //

            //GESTION CUENTAS
            Permission::create(['name' => 'menu.titulo.gestion.cuentas'])->syncRoles([$role4,$role5,$role6,$role8,$role10,$role12,$role15]);

                //SUBTITULO MENU  USUARIOS
                Permission::create(['name' => 'menu.usuarios'])->syncRoles([$role4,$role5,$role6,$role8,$role10,$role12,$role15]);

                    /* USUARIOS VISTA Y CRUD */
                    Permission::create(['name' => 'gestion.cuentas.usuarios.view'])->syncRoles([$role15]);
                    Permission::create(['name' => 'gestion.cuentas.usuarios.nuevo'])->syncRoles([$role15]);
                    Permission::create(['name' => 'gestion.cuentas.usuarios.editar'])->syncRoles([$role15]);
                    Permission::create(['name' => 'gestion.cuentas.usuarios.eliminar'])->syncRoles([$role15]);

                //SUBTITULO MENU  CREDENCIALES
                Permission::create(['name' => 'menu.credenciales'])->syncRoles([$role15]);
                
                    /* CREDENCIALES VISTA Y CRUD */
                    Permission::create(['name' => 'gestion.cuentas.credenciales.view'])->syncRoles([$role15]);
                    Permission::create(['name' => 'gestion.cuentas.credenciales.editar'])->syncRoles([$role15]);
                    Permission::create(['name' => 'gestion.cuentas.credenciales.eliminar'])->syncRoles([$role15]);

            //GESTION SERVICE DESK
            Permission::create(['name' => 'menu.titulo.service.desk'])->syncRoles([$role1,$role2,$role3,$role12,$role15]);
            
                //SUBTITULO MENU  CREAR TICKET
                Permission::create(['name' => 'menu.crear.ticket'])->syncRoles([$role1,$role2,$role3,$role12,$role15]);

                    /* CREAR TICKET VISTA */
                    Permission::create(['name' => 'crear.service.desk.ticket.view'])->syncRoles([$role1,$role2,$role3,$role12,$role15]);

                //SUBTITULO MENU  REQUERIMIENTO
                Permission::create(['name' => 'menu.requerimiento.ticket'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role10,$role12,$role13,$role14,$role15]);

                    /* REQUERIMIENTO VISTA Y CRUD*/
                    Permission::create(['name' => 'requerimiento.ticket.view'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role10,$role12,$role13,$role14,$role15]);
                    Permission::create(['name' => 'requerimiento.ticket.show'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role10,$role12,$role13,$role14,$role15]);
                    Permission::create(['name' => 'requerimiento.ticket.eliminar'])->syncRoles([$role15]);

                                        /* EJECUCION REQUERIMIENTO  */
                                        Permission::create(['name' => 'requerimiento.ticket.ejecucion.view'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role10,$role12,$role13,$role14,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.button.asignar'])->syncRoles([$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.button.actualizar.asignar'])->syncRoles([$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.costo'])->syncRoles([$role4,$role5,$role6,$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.precio'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role12,$role10,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.button.crear'])->syncRoles([$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.button.actualizar'])->syncRoles([$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.button.facturar']);//->syncRoles([$role10,$role12,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.button.nofacturar']);//->syncRoles([$role10,$role12,$role15]);  //FUNCION PENDIENTE

                                        Permission::create(['name' => 'requerimiento.ticket.aprobacion.administrador'])->syncRoles([$role10,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.aprobacion.jefe.operaciones'])->syncRoles([$role6,$role15]);  /* ******* */
                                        Permission::create(['name' => 'requerimiento.ticket.aprobacion.gerente.general'])->syncRoles([$role4,$role15]);  /* ******* */


                                        Permission::create(['name' => 'requerimiento.ticket.eliminar.comentario'])->syncRoles([$role15]);  /* ******* */
            
            //TITULO OTROS
            Permission::create(['name' => 'menu.titulo.otros'])->syncRoles([$role13,$role16,$role15]);

                //SUBTITULO MENU  SSOMA
                Permission::create(['name' => 'menu.titulo.ssoma'])->syncRoles([$role13,$role16,$role15]);

                    /* SSOMA VISTA Y CRUD*/
                    Permission::create(['name' => 'documentacion.ssoma.view'])->syncRoles([$role13,$role16,$role15]);
                    Permission::create(['name' => 'documentacion.ssoma.nuevo'])->syncRoles([$role16,$role15]);
                    Permission::create(['name' => 'documentacion.ssoma.editar'])->syncRoles([$role16,$role15]);
                    Permission::create(['name' => 'documentacion.ssoma.eliminar'])->syncRoles([$role15]);

                
                //SUBTITULO SOPORTE
                Permission::create(['name' => 'menu.titulo.soporte'])->syncRoles([$role15]);

    }
}

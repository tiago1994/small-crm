<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        // Jetstream::createTeamsUsing(CreateTeam::class);
        // Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        // Jetstream::addTeamMembersUsing(AddTeamMember::class);
        // Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        // Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        // Jetstream::deleteTeamsUsing(DeleteTeam::class);
        // Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', __('Admin'), [
            'leads',
            'projects',
            'clients',
            'offers',
            'providers',
            'vehicles',
            'users',
        ])->description(__('Administrador tem acesso a todas as funcionalidades do sistema.'));

        Jetstream::role('instalador', __('Instalador'), [
            'vehicles',
        ])->description(__('Instalador tem acesso somente a gestão de frota de veículos.'));
        
        Jetstream::role('recepcao', __('Recepção'), [
            'leads',
            'clients',
        ])->description(__('Recepção tem acesso somente a leads e clientes.'));
        
        Jetstream::role('comercial', __('Comercial'), [
            'leads',
            'clients',
        ])->description(__('Comercial tem acesso somente a leads e clientes.'));
        
        Jetstream::role('compras', __('Compras'), [
            'offers',
            'providers',
        ])->description(__('Compras tem acesso somente a cotações e fornecedores.'));
    }
}

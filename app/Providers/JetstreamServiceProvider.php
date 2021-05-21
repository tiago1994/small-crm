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

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
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
            'create',
            'read',
            'update',
            'delete',
        ])->description(__('Administrador tem acesso a todas as funcionalidades do sistema.'));

        Jetstream::role('instalador', __('Instalador'), [
            'read',
            'create',
            'update',
        ])->description(__('Instalador tem acesso somente a gestão de frota de veículos.'));
        
        Jetstream::role('recepcao', __('Recepção'), [
            'read',
            'create',
            'update',
        ])->description(__('Recepção tem acesso somente a gestão de leads.'));
        
        Jetstream::role('vendedor', __('Vendedor'), [
            'read',
            'create',
            'update',
        ])->description(__('Vendedor tem acesso somente a gestão de leads.'));
    }
}

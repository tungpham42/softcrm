<?php

namespace App\Models;




use Spatie\Permission\Traits\HasRoles;
use VentureDrake\LaravelCrm\Traits\HasCrmTeams;
use VentureDrake\LaravelCrm\Traits\HasCrmAccess;
use VentureDrake\LaravelCrm\Models\Organization;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'crm_access'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasCrmAccess, HasCrmTeams, HasRoles;

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * The organizations/workspaces this user belongs to.
     */
    public function organizations()
    {
        // Assuming you have a pivot table like 'organization_user'
        return $this->belongsToMany(Organization::class)->withPivot('role');
    }

    /**
     * Set the user's active workspace.
     */
    public function setActiveOrganization(Organization $organization)
    {
        // Store the active organization ID in the session
        session(['active_organization_id' => $organization->id]);
    }
}

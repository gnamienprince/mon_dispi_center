<?php

namespace App\Providers;

use App\Models\Lit;
use Blade;
use DB;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //nombre de consultation par jour
        Blade::directive('nombreConsultationAujourdhui', function () {
            // Obtenir la date d'aujourd'hui au format Y-m-d
            $dateAujourdhui = date('Y-m-d');

            // Obtenir le nombre de consultations pour aujourd'hui en utilisant seulement la date
            $nombreConsultationAujourdhui = DB::table('consultations')
                ->whereDate('created_at', '>=', $dateAujourdhui) // Aujourd'hui à 00:00:00
                ->whereDate('created_at', '<', date('Y-m-d', strtotime($dateAujourdhui . ' + 1 day'))) // Demain à 00:00:00
                ->count();

            return $nombreConsultationAujourdhui;
        });

        Blade::directive('rdv', function () {
            // Votre logique pour obtenir le nombre de consultations aujourd'hui
            $dateAujourdhui = date('Y-m-d');
            $rdv = DB::table('consultations')->whereDate('dateRDV', $dateAujourdhui)->count();
            return $rdv;
        });

        //nombre de lit disponible
        Blade::directive('litsDisponibles', function () {
            // Votre logique pour obtenir le nombre de consultations aujourd'hui
            $litsDisponibles = Lit::where('statut', 0)->count();
            return $litsDisponibles;
        });

    }
}

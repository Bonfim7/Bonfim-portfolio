<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        \App\Models\User::factory()->create([
            'name' => 'Giovani Bonfim',
            'email' => 'admin@portfolio.com',
            'password' => \Hash::make('123456'),
        ]);

        // Technologies
        $techs = [
            ['name' => 'PHP', 'icon' => 'fa-brands fa-php', 'category' => 'Backend', 'level' => 95],
            ['name' => 'Laravel', 'icon' => 'fa-brands fa-laravel', 'category' => 'Backend', 'level' => 90],
            ['name' => 'JavaScript', 'icon' => 'fa-brands fa-js', 'category' => 'Frontend', 'level' => 85],
            ['name' => 'MySQL', 'icon' => 'fa-solid fa-database', 'category' => 'Database', 'level' => 80],
            ['name' => 'TailwindCSS', 'icon' => 'fa-brands fa-css3-alt', 'category' => 'Frontend', 'level' => 85],
            ['name' => 'Docker', 'icon' => 'fa-brands fa-docker', 'category' => 'DevOps', 'level' => 75],
            ['name' => 'Git', 'icon' => 'fa-brands fa-git-alt', 'category' => 'DevOps', 'level' => 90],
        ];

        foreach ($techs as $tech) {
            \App\Models\Technology::create($tech);
        }

        // Experiences
        \App\Models\Experience::create([
            'company' => 'FutFanatics',
            'role' => 'Programador de Sistemas de Informação',
            'description' => 'Desenvolvimento e manutenção de sistemas internos, melhorias em funcionalidades, consultas em banco de dados, documentação e suporte técnico.',
            'start_date' => '2025-02-01',
            'is_current' => true,
            'location' => 'Presidente Prudente, SP',
        ]);

        \App\Models\Experience::create([
            'company' => 'FutFanatics',
            'role' => 'Auxiliar de Armazenagem',
            'description' => 'Atuação em rotinas operacionais e apoio aos processos logísticos do setor.',
            'start_date' => '2024-08-01',
            'end_date' => '2025-02-01',
            'is_current' => false,
            'location' => 'Presidente Prudente, SP',
        ]);

        \App\Models\Experience::create([
            'company' => 'Supermercado Jardins',
            'role' => 'Aprendiz de Açougueiro',
            'description' => 'Apoio às rotinas do setor, organização e atendimento.',
            'start_date' => '2022-08-01',
            'end_date' => '2022-12-09',
            'is_current' => false,
            'location' => 'Presidente Prudente, SP',
        ]);

        // Projects
        $projects = [
            [
                'title' => 'Sistema Operação Expedição - Transferência',
                'slug' => 'sistema-expedicao-transferencia',
                'description' => "Sistema interno para acompanhamento de expedições, dashboards operacionais e controle de acessos.\n\nPrincipais funcionalidades:\n- Controle operacional outbound\n- Double check operacional\n- Dashboards em tempo real\n- Gestão de usuários\n- Controle de erros operacionais",
                'github_url' => 'https://github.com/GiovaniBonfim',
                'order' => 1
            ],
            [
                'title' => 'Sistema Inbound',
                'slug' => 'sistema-inbound',
                'description' => "Sistema interno para gerenciamento e acompanhamento de Notas Fiscais de Entrada.\n\nFuncionalidades:\n- Mapeamento de NFEs\n- Acompanhamento de tratativas\n- Priorização de recebimento\n- Integração ERP e WMS\n- Dashboards operacionais\n- Gestão de usuários via AD",
                'github_url' => 'https://github.com/GiovaniBonfim',
                'order' => 2
            ],
        ];

        foreach ($projects as $proj) {
            $project = \App\Models\Project::create($proj);
            // Attach some specific techs
            $project->technologies()->attach(\App\Models\Technology::whereIn('name', ['Laravel', 'PHP', 'MySQL', 'JavaScript'])->pluck('id'));
        }
    }
}

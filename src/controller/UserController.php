<?php
namespace App\Controller;

use App\Model\User;

class UserController {

    public function showUser($id) {
        // Valida se o $id for um número inteiro positivo.
        if (!is_numeric($id) || $id <= 0) {
            echo "ID de usuário $id: Inválido.<br>";
            return;
        }

        // O que está sendo impresso, hein?
        //echo "ID válido: $id<br>";

        // Busca dados do usuário.
        $userData = $this->getUserDataFromDatabase($id);

        // Quais são os Dados do "Banco", que estão sendo impressos?
        //echo "Dados do usuário: ";
        //var_dump($userData);

        // Instância de modelo de usuário.
        $user = new User($userData['id'], $userData['name'], $userData['email']);

        // Qual usuário?
        //echo "Usuário instanciado: ";
        //var_dump($user);

        // Apresenta a visualização.
        $this->render('user_view.php', ['user' => $user]);
    }

    private function getUserDataFromDatabase($id) {
        // Simula a busca de dados do usuário.
        $users = [
            1 => ['id' => 1, 'name' => 'Amanda Clark', 'email' => 'amanda.clark@email.com'],
            2 => ['id' => 2, 'name' => 'Pietro Petrov', 'email' => 'pietro.petrov@email.com']
        ];

        // Se o ID do usuário existir, retorna os dados do usuário correspondente.
        if (isset($users[$id])) {
            return $users[$id];
        } else {
            // Se não, retorna dados padrão diferentes com base no ID.
            switch ($id) {
                case 0:
                    return ['id' => 0, 'name' => 'Convidado', 'email' => 'convidado@email.com'];
                case 999:
                    echo "ID de usuário $id: Não encontrado.<br> IDs disponíveis: " . implode(', ', array_keys($users));
                    return ['id' => 'Outro Convidado', 'name' => 'Outro Convidado', 'email' => 'outro.convidado@email.com'];   
                default:
                    // Informa que o usuário não foi encontrado, e $id é utilizado.
                    echo "ID de usuário $id: Não encontrado.<br> IDs disponíveis: " . implode(', ', array_keys($users));
                    return ['id' => 'Default', 'name' => 'Default Convidado', 'email' => 'default.convidado@example.com'];
            }
        }
    }

    private function render($view, $data = []) {
        // É uma maneira mais confiável de construir o caminho para a visualização.
        $viewPath = __DIR__ . '/../view/' . $view;

        // Verifica se o arquivo existe antes de incluí-lo.
        if (file_exists($viewPath)) {
            // Extrai array de dados em variáveis.
            extract($data);
            // Passa dados para a view.
            include $viewPath;
        } else {
            // Trata o caso onde o arquivo de visualização não existe.
            echo "Visualização não encontrada: $viewPath";
        }
    }
}
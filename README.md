# Pacote de Integração com Amplitude para Laravel

Este pacote é um cliente para integração com a plataforma de análise de dados Amplitude, desenvolvido para uso com o framework Laravel. Ele fornece uma maneira conveniente de enviar eventos e propriedades de usuário para o Amplitude.

## Requisitos

- PHP 7.4 ou superior
- Laravel 8.x ou superior

## Instalação

Execute o seguinte comando para instalar o pacote:

```
composer require idez/amplitude-laravel
```

## Configuração

Após a instalação, você precisará adicionar as seguintes variáveis ​​de ambiente ao seu arquivo `.env`:

```
AMPLITUDE_API_KEY=SUA_CHAVE_API_DO_AMPLITUDE
```

Em seguida, adicione o seguinte código ao arquivo `config/services.php`:

```php
'amplitude' => [
    'api_key' => env('AMPLITUDE_API_KEY'),
],
```

## Uso

Para começar a enviar eventos para o Amplitude, você pode usar a classe `Amplitude` fornecida por este pacote. Aqui está um exemplo básico de como usá-la:

```php
use Idez\Amplitude\Amplitude;

// Criar uma instância do cliente Amplitude
$amplitude = new Amplitude();

// Definir o usuário e suas propriedades
$amplitude->setUser('user123', ['age' => 25, 'gender' => 'male']);

// Definir o dispositivo
$amplitude->setDevice('device456');

// Enviar um evento para o Amplitude
$response = $amplitude->event('login', ['platform' => 'web']);

// Verificar a resposta do Amplitude
if ($response->successful()) {
    // O evento foi enviado com sucesso
    echo 'Evento enviado para o Amplitude.';
} else {
    // O envio do evento falhou
    echo 'Falha ao enviar o evento para o Amplitude.';
}
```

Certifique-se de substituir `'SUA_CHAVE_API_DO_AMPLITUDE'` pela sua chave de API real do Amplitude.

## Licença

Este pacote está licenciado sob a licença [MIT](https://opensource.org/licenses/MIT).

## Contribuição

Se você encontrar algum problema ou tiver sugestões de melhorias, sinta-se à vontade para abrir uma [issue](https://github.com/seu-usuario/seu-pacote/issues) ou enviar um [pull request](https://github.com/seu-usuario/seu-pacote/pulls) no repositório do pacote no GitHub.

Agradecemos antecipadamente por sua contribuição!
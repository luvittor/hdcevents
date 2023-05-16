# Projeto do Curso de Laravel

Projeto de site de eventos.

[Link para o vídeos das aulas.](https://www.youtube.com/watch?v=qH7rsZBENJo&list=PLnDvRpP8BnewYKI1n2chQrrR4EYiJKbUG&index=1)

## Principais features

- registro de usuário
- CRUD de evento
- registro de participação em um evento
- registro de não-participação em um evento
- upload de imagem do evento
- registro de array em formato JSON no banco de dados
- busca por eventos

## Melhorias possíveis

- validação de campos do formulário de eventos
- verificação se não está sendo forçada a participação do mesmo usuário duas vezes
- busca é apenas no título do evento (poderia buscar na descrição também)
- apagar imagem quando delete ou atualizar evento
- carregar quais "Adicione itens de infraestrutura" foram selecionados quando editar evento

## Melhorias executadas

- não é possivel deletar um evento com participantes (erro de chave estrangeira) -- resolvido: onDelete('cascade')
- Que o "Adicione itens de infraestrutura" texto dos itens seja clicavel





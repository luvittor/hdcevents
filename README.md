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
- validação de campos do formulário de eventos

## Melhorias possíveis após o curso

- formulário de eventos
  - tem como persistir o campo imagem quando der erro de validação nos outros campos?
  - tem como persistir os campos itens quando der erro de validação nos outros campos?
  - unir blade de edicao e inserção de eventos
  - apagar imagem quando delete ou atualizar evento
- verificação se não está sendo forçada a participação do mesmo usuário duas vezes
- busca é apenas no título do evento (poderia buscar na descrição também)
- carregar quais "Adicione itens de infraestrutura" foram selecionados quando editar evento
- exibição do campo description não está formatada (pulo de linha é ignorado)

## Melhorias executadas após o curso

- não é possivel deletar um evento com participantes (erro de chave estrangeira) -- resolvido: onDelete('cascade')
- Que o "Adicione itens de infraestrutura" texto dos itens seja clicavel
- validação de campos do formulário de eventos




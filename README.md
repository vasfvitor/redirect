# Redirect Meteórico => WhatsApp

## Descrição do Projeto
<p>"Sistema" de redirecionamento para grupos de meteórico no WhatsApp.</p>

Tabela de conteúdos
=================
<!--ts-->
   * [Instalação](#instalacao)
   * [Como usar](#como-usar)
      * [config.json](#config)
      * [inks_redirect.csv](#links)
<!--te-->

## Instalação
1) <a hrfe="https://github.com/davidaugusto89/redirect/archive/main.zip" target="_blank">Clique aqui</a> e baixe o zip com os arquivos.
2) Faça upload do zip ou da dos arquivos para o servidor remoto.
2.1) Caso seja feito o upload do zip, será necessário descompactar o mesmo no servidor.

## Como usar

O "sistema" faz o redirect para os grupos conforme o contador atingir o número máximo de acesso.

### config.json
Arquivo de personalização visual do redirecionador em JSON.

Alterar somente o conteúdo entre aspas.

"titulo_pagina" => título que será demonstrando na aba do navegador.
"head_line" => (opcional) texto da headline, caso não for utilizar deixar em branco.
"sub_head_line" => (opcional) texto abaixo headline, caso não for utilizar deixar em branco.
"mensagem_redirect" => mensagem abaixo do loader informando ao usuário que ele será redirecionado.
"tempo_redirect" => tempo de espera em segundos que será redirecionado para o grupo no WhatsApp

### links_redirect.csv

Manter a primeira linha na planilha.
1º coluna => link do grupo no WhatsApp.
2º coluna => número máximo de acessos a página.
3º coluna => preencher com 0, será utilizada pelo script para contar o número de acessos atual. Assim que o número for igual ao anterior, irá prosseguir para o próximo grupo.

using System;
using System.Collections.Generic;
using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Http;

class Program
{
    public static void Main(string[] args)
    {
        var builder = WebApplication.CreateBuilder(args);
        var app = builder.Build();

        // Listas em memória para simular um banco de dados
        var contatos = new List<Contato>();
        var livros = new List<Livro>();

        // --- Rota Principal ---
        app.MapGet("/", () =>
        {
            return "API rodando com sucesso!";
        });

        // --- Rotas de Contatos ---
        app.MapGet("/contatos", () => contatos);
        
        app.MapPost("/contatos", (Contato c) =>
        {
            contatos.Add(c);
            return Results.Ok("Contato adicionado!");
        });

        // --- Rotas de Livros ---
        app.MapGet("/livro", () => livros);
        
        app.MapPost("/livro", (Livro l) =>
        {
            livros.Add(l);
            return Results.Ok("Livro adicionado!");
        });

        app.MapGet("/livro/{titulo}", (string titulo) =>
        {
            foreach (var l in livros)
            {
                if (l.Titulo.Equals(titulo, StringComparison.OrdinalIgnoreCase))
                {
                    return Results.Ok(l);
                }
            }
            return Results.NotFound("Livro não encontrado");
        });

        app.MapPut("/livro/emprestar/{titulo}", (string titulo) =>
        {
            foreach (var l in livros)
            {
                if (l.Titulo.Equals(titulo, StringComparison.OrdinalIgnoreCase))
                {
                   l.Emprestar();
                   return Results.Ok("Livro Emprestado!");
                }
            }
            return Results.NotFound("Livro não encontrado");
        });

        app.MapPut("/livro/devolver/{titulo}", (string titulo) =>
        {
            foreach (var l in livros)
            {
                if (l.Titulo.Equals(titulo, StringComparison.OrdinalIgnoreCase))
                {
                   l.Devolver();
                   return Results.Ok("Livro Devolvido!");
                }
            }
            return Results.NotFound("Livro não encontrado");
        });


        app.Run();
    }
}

// --- Classes de Modelo ---

class Contato
{
    public string Nome { get; set; }
    public string Telefone { get; set; }
}

class Livro
{
    public string Titulo { get; set; }
    public int Ano { get; set; }
    public bool Disponivel { get; set; } = true;

    public void Emprestar()
    {
        Disponivel = false; 
    }

    public void Devolver() 
    {
        Disponivel = true;
    }
}
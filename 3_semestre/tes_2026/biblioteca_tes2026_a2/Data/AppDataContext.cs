using Microsoft.EntityFrameworkCore;
using biblioteca_tes2026_a2.Models;

namespace biblioteca_tes2026_a2.Data;

public class AppDataContext : DbContext
{
    public AppDataContext(DbContextOptions<AppDataContext> options)
        : base(options)
    {
    }

    public DbSet<Livro> Livros { get; set; }
    public DbSet<Usuario> Usuarios { get; set; }
    public DbSet<Emprestimo> Emprestimos { get; set; }

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        modelBuilder.Entity<Livro>()
            .HasIndex(l => new { l.Titulo, l.Autor, l.AnoPublicacao })
            .IsUnique();

        modelBuilder.Entity<Usuario>()
            .HasIndex(u => u.Nome)
            .IsUnique();
    }
}

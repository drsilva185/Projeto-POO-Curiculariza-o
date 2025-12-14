package com.delegacias.model;


import jakarta.persistence.*;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import jakarta.validation.constraints.Size;

@Entity
@Table(name= "policiais")
public class Policial {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @NotBlank(message = "O nome é obrigatório!!")
    @Size(max = 150)
    private String nome;

    @NotBlank(message = "A patente é obrigatória")
    @Size(max = 50)
    private String patente;

    @NotBlank(message = "O Registro (Matrícula) é obrigatório!!")
    @Column(unique = true)
    private String matricula;

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "delegacia_id", nullable = false)
    @NotNull(message = "A delegacia é obrigatória")
    private Delegacia delegacia;

    public Policial() {}

    // Construtor com todos os campos (opcional)
    public Policial(String nome, String patente, String matricula, Delegacia delegacia) {
        this.nome = nome;
        this.patente = patente;
        this.matricula = matricula;
        this.delegacia = delegacia;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getPatente() {
        return patente;
    }

    public void setPatente(String patente) {
        this.patente = patente;
    }

    public String getMatricula() {
        return matricula;
    }

    public void setMatricula(String matricula) {
        this.matricula = matricula;
    }

    public Delegacia getDelegacia() {
        return delegacia;
    }

    public void setDelegacia(Delegacia delegacia) {
        this.delegacia = delegacia;
    }
}

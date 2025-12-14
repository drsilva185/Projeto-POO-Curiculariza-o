package com.delegacias.model;

import jakarta.persistence.*;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import jakarta.validation.constraints.Size;

@Entity
@Table(name= "bombeiros")
public class Bombeiros {
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
    @JoinColumn(name = "bombeiro_id", nullable = false)
    @NotNull(message = "O Corpo é obrigatório")
    private Bombeiro bombeiro;

    public Bombeiros() {

    }

    public Bombeiros(Long id, String nome, String patente, String matricula, Bombeiro bombeiro) {
        this.id = id;
        this.nome = nome;
        this.patente = patente;
        this.matricula = matricula;
        this.bombeiro = bombeiro;
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

    public Bombeiro getBombeiro() {
        return bombeiro;
    }

    public void setBombeiro(Bombeiro bombeiro) {
        this.bombeiro = bombeiro;
    }
}

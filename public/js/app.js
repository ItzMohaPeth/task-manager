// JavaScript pour améliorer l'expérience utilisateur

// Import Bootstrap
const bootstrap = window.bootstrap

document.addEventListener("DOMContentLoaded", () => {
  // Auto-dismiss des alertes après 5 secondes
  const alerts = document.querySelectorAll(".alert-dismissible")
  alerts.forEach((alert) => {
    setTimeout(() => {
      const bsAlert = new bootstrap.Alert(alert)
      bsAlert.close()
    }, 5000)
  })

  // Confirmation avant suppression
  const deleteButtons = document.querySelectorAll('form[action*="/delete/"]')
  deleteButtons.forEach((form) => {
    form.addEventListener("submit", (e) => {
      if (!confirm("Êtes-vous sûr de vouloir supprimer cette tâche ?")) {
        e.preventDefault()
      }
    })
  })

  // Animation smooth pour les transitions
  const cards = document.querySelectorAll(".card")
  cards.forEach((card, index) => {
    card.style.animationDelay = index * 0.1 + "s"
    card.classList.add("animate-in")
  })

  // Focus automatique sur le premier champ de formulaire
  const firstInput = document.querySelector('form input[type="text"]:first-of-type')
  if (firstInput) {
    firstInput.focus()
  }
})

// Ajouter une classe CSS pour l'animation
const style = document.createElement("style")
style.textContent = `
    .animate-in {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`
document.head.appendChild(style)

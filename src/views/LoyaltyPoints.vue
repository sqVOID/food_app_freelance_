<template>
  <ion-menu content-id="main-content" side="start">    
    <ion-toolbar>
    <div class="profile-container">
     <ion-avatar class="profile-avatar2">
        <img :src="profileImage" alt="Profile-menu" class="profile-menu"/>
      </ion-avatar>
      <div class="menu-points-2">
    <img class="crown-icon2" src="@/assets/Fairytale.png" alt="Crown" />
    <span class="points-text2">{{ points }} Points</span>
    <ion-icon :icon="chevronForwardOutline" class="chevron-icon2"></ion-icon>
  </div>

  <ion-label class="profile-info">
    <h2>{{ username }} {{ lastname }}</h2>
    <p>{{ phoneNumber }}</p>
  </ion-label>
 </div>

    </ion-toolbar>
  <ion-content>
    <ion-list>
      <ion-item button @click="navigateTo('home')">
        <img  src="@/assets/logo.png"  alt="Home Logo" class="menu-logo"  />
        <ion-label class="menu-label">Home</ion-label>
      </ion-item>

      <!-- npx cap sync android -->
       <!-- npx cap run android -->
       <!-- ionic capacitor run android -l --external -->

       <ion-item button @click="navigateTo('orders')">
        <ion-icon :icon="bagCheckSharp" color="danger"></ion-icon>
        <ion-label class="menu-label">Order Now!</ion-label>
      </ion-item>

      <ion-item button @click="navigateTo('notification')">
        <ion-icon :icon="notificationsSharp" color="danger"></ion-icon>
        <ion-label class="menu-label">Notifications</ion-label>
      </ion-item>

      <ion-item button @click="navigateTo('store')">
        <ion-icon :icon="storefrontSharp" color="danger"></ion-icon>
        <ion-label class="menu-label">Store Locator</ion-label>
      </ion-item>

      <ion-item button @click="navigateTo('faq')">
        <ion-icon :icon="helpCircleSharp" color="danger"></ion-icon>
        <ion-label class="menu-label">FAQ's</ion-label>
      </ion-item>

      <ion-item button @click="navigateTo('myorders')">
        <ion-icon :icon="bagHandleSharp" color="danger"></ion-icon>
        <ion-label class="menu-label">My Orders</ion-label>
      </ion-item>

      <ion-item button @click="navigateTo('myaccount')">
        <ion-icon :icon="personSharp" color="danger"></ion-icon>
        <ion-label class="menu-label">My Account</ion-label>
      </ion-item>

      <ion-item button @click="navigateTo('myfav')">
        <ion-icon :icon="heartSharp" color="danger"></ion-icon>
        <ion-label class="menu-label">My Favorites</ion-label>
      </ion-item>

      <ion-item button @click="navigateTo('ordertrack')">
        <ion-icon :icon="locationSharp" color="danger"></ion-icon>
        <ion-label class="menu-label">Order Tracker</ion-label>
      </ion-item>

      <ion-item button @click="navigateTo('orderhistory')">
        <ion-icon :icon="timeSharp" color="danger"></ion-icon>
        <ion-label class="menu-label">Order History</ion-label>
      </ion-item>

      <ion-button color="red" class="logout-btn" @click="logout">
      Logout
    </ion-button>
    </ion-list>
  </ion-content>
  </ion-menu>
  <ion-page id="main-content">
    <ion-header class="no-border">
      <ion-toolbar>
        <ion-buttons slot="start">
          <ion-menu-button class="menu-button"> 
            <ion-icon :icon="menuOutline" class="menu-icon"></ion-icon>
          </ion-menu-button>
        </ion-buttons>
        <ion-title>
          <div class="points-container5">
            <span class="points-text5"> Loyalty Points</span>
          </div>
        </ion-title>
        <ion-buttons slot="end">
        </ion-buttons>
      </ion-toolbar>
    </ion-header>

    <ion-content>
  <div class="content-points">
    <div class="tier-section">
      <img class="crown-icon5" src="@/assets/Fairytale.png" alt="Crown" />
      <span class="tier-text">Beginner Tier</span>
      <a href="#" class="view-all">View All</a>
      <ion-icon :icon="chevronForwardOutline" color="danger"class="arrow-icon"></ion-icon>
    </div>
    
    <p class="points-description">
      Earn points by purchasing from our store. Vestibulum 
    </p>
    <p class="points-description2">
      ante ipsum primis in faucibus orci luctus et.
    </p>

    <div class="points-circle-container">
      <svg class="progress-circle" viewBox="0 0 100 100">
      
        <circle class="progress-bg" cx="50" cy="50" r="45"></circle>
     
        <circle class="progress-bar" cx="50" cy="50" r="45"
          :stroke-dasharray="circleCircumferewnce"
          :stroke-dashoffset="progressOffset">
        </circle>
      
        <text x="50" y="50" text-anchor="middle" alignment-baseline="middle" class="progress-text">
          {{ points }} / 160
        </text>
      </svg>
    </div>
    <div class="rewards-section">
  <div class="rewards-header">
    <h3>Rewards</h3>
    <a href="#" class="how-it-works">How it Works</a>
    <ion-icon :icon="chevronForwardOutline" color="danger"class="arrow-icon"></ion-icon>
  </div>

  <div class="rewards-filters">
    <button class="filter-btn active">All</button>
    <button class="filter-btn">Beginner</button>
    <button class="filter-btn">Intermediate</button>
    <button class="filter-btn">Loyal</button>
  </div>

  <div class="reward-item">
    <img src="@/assets/Steak.png" alt="Reward Image" class="reward-img"/>
    <div class="reward-details">
      <h4>Steak Fries Veggies</h4>
      <p>Meat</p>
      <span class="reward-points">👑&nbsp;&nbsp;20 points</span>
    </div>
  </div>
</div>

  </div>
</ion-content>

  </ion-page>
</template>

<script>
import { defineComponent, ref, onMounted } from "vue";
import { 
  IonPage, IonHeader, IonToolbar, IonButtons, IonButton, IonTitle, IonAvatar, IonContent, 
  IonIcon, IonMenu, IonMenuButton, IonList, IonItem 
} from "@ionic/vue";
import { 
  menuOutline, chevronForwardOutline, 
  homeOutline, cartOutline, notificationsOutline, 
  locationOutline, helpCircleOutline, documentTextOutline, 
  personOutline, heartOutline, locationSharp, timeSharp, 
  bagCheckSharp,
  notificationsSharp,
  storefrontSharp,
  helpCircleSharp,
  bagHandleSharp,
  personSharp,
  heartSharp
} from "ionicons/icons";
import "@/assets/styles/LoyaltyPoints.css";
import axios from "axios";
import { useRouter } from "vue-router";

export default defineComponent({
  components: {
    IonPage,
    IonHeader,
    IonToolbar,
    IonButtons,
    IonButton,
    IonTitle,
    IonAvatar,
    IonContent,
    IonIcon,
    IonMenu,
    IonMenuButton,
    IonList,
    IonItem,
  },
  setup() {
    const points = ref(0);
    const profileImage = ref("");
    const username = ref("");
    const lastname = ref("");
    const phoneNumber = ref("");
    const maxPoints = 160;
    const circleRadius = 45;
    const circleCircumference = 2 * Math.PI * circleRadius;
  
    

    const fetchUserData = async () => {
    try {
        const response = await axios.get("http://192.168.18.13/myproject/userData.php");
        console.log("User Data:", response.data);

        username.value = response.data.username;
        lastname.value = response.data.lastname;
        phoneNumber.value = response.data.phoneNumber;
        profileImage.value = response.data.profileImage;
        points.value = response.data.points;
    } catch (error) {
        console.error("Error fetching user data:", error);
    }
};

onMounted(fetchUserData);
    const navigateTo = (page) => {
      console.log("Navigating to", page);
      window.location.href = `/${page}`;
    };

    const logout = () => {
      console.log("Logging out");
    };

    return {
      points,
      profileImage,
      username,
      lastname,
      phoneNumber,
      navigateTo,
      logout,
      homeOutline,
      bagCheckSharp,
      notificationsSharp,
      cartOutline,
      notificationsOutline,
      locationOutline,
      helpCircleOutline,
      documentTextOutline,
      personOutline,
      heartOutline,
      locationSharp,
      timeSharp,
      menuOutline,
      chevronForwardOutline,
      storefrontSharp,
      helpCircleSharp,
      bagHandleSharp,
      personSharp,
      heartSharp,
    };
  },
});

</script>


import{aI as o}from"./app-d86e0e0e.js";const r={UP:"UP",DOWN:"DOWN"},d=o("UserStore",{state:()=>({authUser:null}),actions:{setAuthUser(e){this.authUser={...e}},updateUserVotes(e){this.authUser.votes=e},updateUserFavorites(e){this.authUser.favorites=e},updateUserComments(e){this.authUser.comments=e}},getters:{isGuest:e=>e.authUser===null,isAuthorOfIdea:e=>s=>{var t;return((t=e.authUser)==null?void 0:t.id)===s.author.id},avatar:e=>{var s;return((s=e.authUser)==null?void 0:s.avatar)??"https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png"},hasFavoritedIdea:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.favorites.some(a=>a.favoriteable_id===s.id)},hasVotedIdea:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.votes.some(a=>a.voteable_id===s.id)},hasUpvotedIdea:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.votes.some(a=>a.voteable_id===s.id&&a.type===r.UP)},hasDownvotedIdea:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.votes.some(a=>a.voteable_id===s.id&&a.type===r.DOWN)}},persist:{storage:sessionStorage}});export{r as V,d as u};
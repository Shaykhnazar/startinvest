import{a_ as u}from"./app-CUnbgRqf.js";const o={UP:"UP",DOWN:"DOWN"},r={PENDING:"PENDING",CANCELED:"CANCELED",ACCEPTED:"ACCEPTED",REJECTED:"REJECTED",LEAVED:"LEAVED"},h=u("UserStore",{state:()=>({authUser:null}),actions:{setAuthUser(e){this.authUser={...e}},updateUserVotes(e){this.authUser.votes=e},updateUserFavorites(e){this.authUser.favorites=e},updateUserComments(e){this.authUser.comments=e},updateUserJoinRequests(e){this.authUser.joinRequests=e},updateContributors(e){this.authUser.contributors=e}},getters:{isGuest:e=>e.authUser===null,isAuthorOfIdea:e=>s=>{var t;return((t=e.authUser)==null?void 0:t.id)===s.author.id},avatar:e=>{var s;return((s=e.authUser)==null?void 0:s.avatar)??"https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png"},hasFavoritedIdea:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.favorites.some(a=>a.favoriteable_id===s.id)},hasVotedIdea:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.votes.some(a=>a.voteable_id===s.id)},hasUpvotedIdea:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.votes.some(a=>a.voteable_id===s.id&&a.type===o.UP)},hasDownvotedIdea:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.votes.some(a=>a.voteable_id===s.id&&a.type===o.DOWN)},hasPendingJoinRequest:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.joinRequests.some(a=>a.startup_id===s&&a.status===r.PENDING)},hasAcceptedJoinRequest:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.joinRequests.some(a=>a.startup_id===s&&a.status===r.ACCEPTED)},hasRejectedJoinRequest:e=>s=>{var t;return(t=e.authUser)==null?void 0:t.joinRequests.some(a=>a.startup_id===s&&a.status===r.REJECTED)},getJoinRequest:e=>s=>{var t;return((t=e.authUser)==null?void 0:t.joinRequests.find(a=>a.startup_id===s))??null}},persist:{storage:sessionStorage}});export{r as J,o as V,h as u};